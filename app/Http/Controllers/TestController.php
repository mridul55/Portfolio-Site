<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\support\carbon;
class TestController extends Controller
{
    public function TestPage(){
       
      $test = Test::all();
      return view('admin.test.test_page_all',compact('test'));
    }

    public function AddTestPage(){

        return view('admin.test.test_page_add');
    }

    public function StorePage(Request $request){
        
       $request ->validate([
          'name' => 'required',
          'address' => 'required',
          'phone' => 'required',
       ]);
       Test::create([
          'name' => $request->name,
          'address' => $request->address,
          'phone' => $request->phone,
       ]);
       $notification = array(
         'message' => 'Inser Successfully',
         'alert-type' => 'info',
       );
       return redirect()->route('all.test')->with($notification);
    }

    public function EditTestPage($id){

        $editTest = Test::findOrFail($id);
        return view('admin.test.edit_test',compact('editTest'));
    }

    public function updateTestPage(Request $request, $id){
       
        $request-> validate([
            'name'    => 'required',
            'address' => 'required',
            'phone'   => 'required',

        ]);
        Test::findOrFail($id)->update([
             'name'     => $request->name,
             'address'  => $request->address,
             'phone'    => $request->phone,
             'updated_at' => Carbon::now(),
        ]);

        $notification = array(
             'message' => 'Updated Successfully Done',
             'alert-type' => 'success',
        );
        
        return redirect()->route('all.test')->with($notification);
    }

    public function DeleteTestPage($id){

        Test::findOrFail($id)->delete();

        $notification = array(
          'message' => 'Deleted Successfully',
          'alert-type' => 'danger'
        );
        return redirect()->back()->with($notification);
    }

}
