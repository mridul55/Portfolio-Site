<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\About;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\BlogCategory;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function HomeMain(){
        return view('frontend.index');
    }
    
    public function HomeAbout(){

        $aboutpage = About::find(1);
        return view('frontend.about_page',compact('aboutpage'));
    }

    public function ServicePage(){

        //$aboutpage = About::find(1);
        return view('frontend.service_page');
    }

    public function BlogPage(){
        $categories =BlogCategory::with('blogpost')->orderby('blog_category','ASC')
        ->get();
        //->toSql();
         //dd($categories);
         
         
        $allblogs = Blog::latest()
        ->paginate(3);
        // ->toSql();
        // dd($allblogs);
        return view('frontend.blog',compact('categories','allblogs'));
    }

    public function BlogPageDetails($id){
        $categories =BlogCategory::orderby('blog_category','ASC')->get();
        $allblogs = Blog::latest()->paginate(3);
        return view('frontend.blog_details',compact('categories','allblogs'));
    }

    

    public function Contact(){

        return view('frontend.contact');
   
       }


    public function HomePortfolio(){

        $portfolio = Portfolio::latest()->get();
        return view('frontend.portfolio_page',compact('portfolio'));

    }

    public function PortfolioDetails($id){

        $detail = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details_page',compact('detail'));

    }

    public function StoreMessage(Request $request){

        Contact::insert([
            'name' => $request-> name,
            'email' => $request-> email,
            'subject' => $request-> subject,
            'phone' => $request-> phone,
            'message' => $request-> message,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Thank You Your Message Successfully Sent',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

   public function CategoryBlog($id){
       
      $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
      $allblogs = Blog::latest()->limit(5)->get();
      $categories =BlogCategory::with('blogpost')->orderby('blog_category','ASC')->get();
      $categoryname = BlogCategory::findOrFail($id);
      return view('frontend.cat_og_details',compact('blogpost','allblogs','categories','categoryname'));

    }


}
