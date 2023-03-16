<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Support\Carbon;

class FooterController extends Controller
{
    public function AllFooter(){
        $allfooter = Footer::find(1);
        return view('admin.footer_setup.all_footer', compact('allfooter'));

    }

    public function UpdateFooter(Request $request, $id){
       
        Footer::findorFail($id)->update([
                 'number' => $request->number,
                 'short_description' => $request->short_description,
                 'address' => $request->address,
                 'email' => $request->email,
                 'facebook' => $request->facebook,
                 'twitter' => $request->twitter,
                 'copyright' => $request->copyright,
            ]);
            $notification = array(
                'message' => 'Footer Page Updated Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);

    
    }

    
}
