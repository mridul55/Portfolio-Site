<?php

namespace App\Http\Controllers;
use Image;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\partnermultiimage;
use App\Http\Controllers\PartnerController;

class PartnerController extends Controller
{
    public function partnerPage(){
        $partner_page = Partner::find(1);
        return view('admin.partner.partner_page',compact('partner_page'));
    }

    public function partnerUpdate(Request $request,$id){
        
        Partner::findorFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,     

       ]);

       $notification = array(
           'message' => 'Partner Page Updated',
           'alert-type' => 'success',
       );

       return redirect()->back()->with($notification);
    }

    public function partnerMultiImage(){

       return view('admin.partner.add_multiimage');
    }
    public function StorPartnereMultiImage(Request $request){

        $image = $request->file('multi_image');

        foreach ($image as $multi_image){

            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension(); // 764587.jpg
            Image::make($multi_image)->resize(220,220)->save('upload/partner/'. $name_gen);
            $save_url = 'upload/partner/'.$name_gen;

            partnermultiimage::insert([
                'multi_image' => $save_url,
                'created_at'=>Carbon::now()

           ]);

        }//End For foreach

           $notification = array(
               'message' => 'Multiple Image Insert Succesfully',
               'alert-type' => 'success'
           );
   
           return redirect()->route('all.multiimage')->with($notification);

    }

    public function AllPartnerMultiImage(){
       
        $allmulti = partnermultiimage::all();
        return view('admin.partner.all_multiimage',compact('allmulti'));
    }

    public function EditPartnerMultiImage($id){

        $editImage = partnermultiimage::findOrFail($id);
        return view('admin.partner.edit_multiImage',compact('editImage'));
    }

    public function UpdatePartnerMultiImage(Request $request,$id){
       
        if( $request->file('multi_image')){
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 764587.jpg
            Image::make($image)->resize(220,220)->save('upload/partner/'. $name_gen);
            $save_url = 'upload/partner/'.$name_gen;


            partnermultiimage::findorFail($id)->update([      
                 'multi_image' => $save_url,

            ]);
            $notification = array(
                'message' => 'Updated Multi Image',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.multiimage')->with($notification);

        }
    }

    public function DeletePartnerMultiImage($id){
        
        $multiImage = partnermultiimage::findOrFail($id);
        $img = $multiImage->multi_image;
        unlink($img);

        partnermultiimage::findFail($id)->delete();

        $notification = array(
          'message' => 'Image Deleted successfully',
          'a'
        );
    }


}
