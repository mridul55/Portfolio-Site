<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
   
    

    public function ContactMessage(){

        $contact = Contact::latest()->get();
        return view('admin.contact.all_contact', compact('contact'));
    }

    public function DeleteMessage($id){

        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => ' Message Successfully Deleted',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    
}
