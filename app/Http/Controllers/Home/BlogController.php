<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;
use Illuminate\Support\Carbon;
use Auth;

class BlogController extends Controller
{
    public function AllBlog(){
        
        $blog_all = Blog::latest()->get();
        $categories =BlogCategory::orderby('blog_category','ASC')->get();
        return view('admin.blog.blogs_all',compact('blog_all','categories'));
    }

    public function AddBlog(){

        $categories =BlogCategory::orderby('blog_category','ASC')->get();
        return view('admin.blog.add_blog',compact('categories'));
    }

    public function StoreBlog(Request $request){
        
        $request->validate([ //Default Message for field is required
            'blog_category_id' => 'required',
            'blog_title' => 'required',
            'blog_tags' => 'required',
            // 'blog_image' => 'required',
            // 'blog_description' => 'required',

         ],[
              //Custome Message Blog Name is Required
            'blog_category_id.required' => 'Category is Required',
            'blog_title.required' => 'Blog Title is Required',

         ]);

            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 764587.jpg
            Image::make($image)->resize(430,327)->save('upload/blog_image/'. $name_gen);
            $save_url = 'upload/blog_image/'.$name_gen;

            Blog::insert([
                 'blog_category_id' => $request->blog_category_id,
                 'blog_title' => $request->blog_title,
                 'blog_tags' => $request->blog_tags,
                 'blog_description' => $request->blog_description,

                 'blog_image' => $save_url,
                 'created_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'Blog Page Inserted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.blog')->with($notification);

    }

    public function EditBlog($id){
        
        $editblog = Blog::findOrFail($id);
        //dd($editblog);
        $categories =BlogCategory::orderby('blog_category','ASC')->get();
        
        return view('admin.blog.edit_blog',compact('editblog','categories'));
    }

    public function UpdateBlog(Request $request, $id)
    {
        //dd($id);
        if( $request->file('blog_image')){
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 764587.jpg
            Image::make($image)->resize(430,327)->save('upload/blog_image/'. $name_gen);
            $save_url = 'upload/blog_image/'.$name_gen;

            Blog::findorFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
      
                'blog_image' => $save_url,
                 'updated_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'Blog Page Update With Image',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.blog')->with($notification);

        } else{
            Blog::findorFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description, 
                'updated_at' => Carbon::now(),

           ]);
           $notification = array(
               'message' => 'Blog page Update Without Image',
               'alert-type' => 'success'
           );
           return redirect()->route('all.blog')->with($notification);
        }
    }

    public function DeleteBlog($id){
        
        $delblog = Blog::findOrFail($id);
        $img = $delblog->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Post Deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    // public function BlogDetails($id){
        
    //     $allblogs = Blog::latest()->limit(5)->get();
    //     $blogs = Blog::findOrFail($id);
    //     $categories =BlogCategory::orderby('blog_category','ASC')->get();
    //     return view('frontend.blog_details', compact('blogs','allblogs','categories'));
    // }

    // public function CategoryBlog($id){
       
    //   $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
    //   $allblogs = Blog::latest()->limit(5)->get();
    //   $categories =BlogCategory::orderby('blog_category','ASC')->get();
    //   $categoryname = BlogCategory::findOrFail($id);
    //   return view('frontend.cat_blog_details',compact('blogpost','allblogs','categories','categoryname'));

    // }

    
}
