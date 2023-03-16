<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Image;
use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    public function AllPortfolio(){

     $portfolio_all = Portfolio::latest()->get();
     return view('admin.portfolio.portfolio_all',compact('portfolio_all'));

    }

    public function AddPortfolio(){
        
        return view('admin.portfolio.portfolio_add');
    }

    public function StorePortfolio(Request $request){
          
         $request->validate([ //Default Message for field is required
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required',
            'portfolio_description' => 'required',

         ],[
              //Custome Message Portfolio Name is Required
            'portfolio_name.required' => 'Portfolio Name is Required',
            'portfolio_title.required' => 'Portfolio Title is Required',

         ]);

            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 764587.jpg
            Image::make($image)->resize(1020,519)->save('upload/portfolio_image/'. $name_gen);
            $save_url = 'upload/portfolio_image/'.$name_gen;

            Portfolio::insert([
                 'portfolio_name' => $request->portfolio_name,
                 'portfolio_title' => $request->portfolio_title,
                 'portfolio_description' => $request->portfolio_description,
       
                 'portfolio_image' => $save_url,
                 'created_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'Portfolio Page Inserted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.portfolio')->with($notification);

    }

    public function EditPortfolio($id){
        $editPortfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit_portfolio', compact('editPortfolio'));
    }

    public function UpdatePortfolio(Request $request){

        $updateportfolio_id = $request->id;
        //dd($updateportfolio_id);
        if( $request->file('portfolio_image')){
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 764587.jpg
            Image::make($image)->resize(1029,519)->save('upload/portfolio_image/'. $name_gen);
            $save_url = 'upload/portfolio_image/'.$name_gen;

            Portfolio::findorFail($updateportfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
      
                'portfolio_image' => $save_url,
                 'updated_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'Portfolio Update With Image',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.portfolio')->with($notification);

        } else{
            Portfolio::findorFail($updateportfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description, 
                'updated_at' => Carbon::now(),

           ]);
           $notification = array(
               'message' => 'Portfolio Without Image',
               'alert-type' => 'success'
           );
           return redirect()->route('all.portfolio')->with($notification);
        }
    }

    public function DeletePortfolio($id){

        $delportfolio = Portfolio::findOrFail($id);
        $img = $delportfolio->portfolio_image;
        unlink($img);

        Portfolio::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Portfolio Deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

   
}
