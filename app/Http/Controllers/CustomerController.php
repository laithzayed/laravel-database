<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use App\customer;
//
//class CustomerController extends Controller
//{
//    public function store(Request $request){
//
//        $request->validate([
//            'nid'      => 'required|min:10',
//            'name' => 'required',
//            'email'    => 'required',
//            'mobile'   => 'required|min:10|max:14',
//            'address'  => 'required',
//            'student_image' => '',
//
//
//        ]);
//
//        customer::create([
//            "nid"      => $request->nid,
//            "name" => $request->name,
//            "email"    => $request->email,
//            "mobile"   => $request->mobile,
//            "address"   => $request->address,
//            'student_image' => $request->student_image,
//
//
//        ]);
////        return "done";
//        return redirect('table');
//    }
//    public function view(){
//        $user = customer::all();
//
//        return view('users.index', [
//            "x" => $user
//        ]);
//        // You can use compact method here
//    }
//
//
//    public function show($id){
//        $x = customer::where('userid', $id)->get()->first();
//        return view('users.show', [
//            "user"=>$x
//        ]);
//    }
//}




namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = customer::all();

        return view('dashboard.admin', [
            "x" => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = customer::all();

        return view('users.index', [
            "x" => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = $request->file('student_image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $request->validate([
            'nid'      => 'required|min:10',
            'name' => 'required|regex:/^[\w]+\s[\w]+\s[\w]+\s[\w]+/',
            'email'    => 'required',
            'mobile'   => 'required|min:10|max:14',
            'address'  => 'required',
            'student_image' => '',


        ]);

        customer::create([
            "nid"      => $request->nid,
            "name" => $request->name,
            "email"    => $request->email,
            "mobile"   => $request->mobile,
            "address"   => $request->address,
            'student_image' => $request->student_image,






        ]);
//        return "done";
        return redirect('table');
    }
    public function view(){
        $user = customer::all();

        return view('users.index', [
            "x" => $user
        ]);
        // You can use compact method here
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $x = customer::where('userid', $id)->get()->first();
        return view('users.show', [
            "user"=>$x
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $user = customer::findOrFail($id);
//        return view('edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
//        $image_name = $request->hidden_image;
//        $image = $request->file('image');
//        if ($image != '') {
//            $request->validate([
//                // 'first_name'  =>  'required',
//
//                'nid'         =>  'required|min:10|max:10',
//                'fullname'    =>  'required|regex:/^[\w]+\s[\w]+\s[\w]+\s[\w]+/',
//                'email'       =>  'required|email',
//                'mobile'      =>  'required',
//                'address'     =>  'required',
//
//                // 'last_name'   =>  'required',
//                'student_image'       =>  ''
//            ]);
//            $image_name = rand() . '.' . $image->getClientOriginalExtension();
//            $image->move(public_path('images'), $image_name);
//        } else {
//            $request->validate([
//                // 'first_name'  =>  'required',
//
//                'nid'         =>  'required',
//                'fullname'    =>  'required',
//                'email'       =>  'required',
//                'mobile'      =>  'required',
//                'address'     =>  'required'
//
//                // 'last_name'   =>  'required'
//            ]);
//        }
//
//        $form_data = array(
//            // 'first_name'     =>  $request->first_name,
//
//            'nid'            =>   $request->NID,
//            'fullname'       =>   $request->Fullname,
//            'email'          =>   $request->Email,
//            'mobile'         =>   $request->Mobile,
//            'address'        =>   $request->Address,
//
//            // 'last_name'      =>  $request->last_name,
//            'student_image'          =>  $image_name
//        );
//
//        customer::whereId($userid)->update($form_data);
//        return redirect('customer')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($userid)
    {
//      $user = customer::findorfail($userid);
//      $user->delete();
//      return redirect('users.index')->with('success', 'Deleted Successfully');

        $user = customer::where('userid', $userid)->delete();
        return redirect('/admin');


    }
}

