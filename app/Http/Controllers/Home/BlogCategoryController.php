<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Carbon;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory(){

        $allblog = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all',compact('allblog'));
    }

    public function AddBlogCategory(){
        
        return view('admin.blog_category.add_blog_category');
    }

    public function StoreBlogCategory(Request $request ){

        $request->validate([ //Default Message for field is required
            'blog_category' => 'required'
         ],[
              //Custome Message Portfolio Name is Required
            'blog_category.required' => 'Category Name is Required',

          ]);
        //  $blog = new BlogCategory();    //$blog = BlogCategory::find($id); update ar jonno
        //  $blog->blog_category = $request->blog_category;
        //  $blog->created_at = Carbon::now();
        //  $blog->save();

    //      BlogCategory::insert([
    //         'blog_category' => $request->blog_category,
    //         'created_at' => Carbon::now(),
    //    ]);
                                         //BlogCategory::create($request->all());
         BlogCategory::create([
            'blog_category' => $request->blog_category,
            'created_at' => Carbon::now(),

       ]);
       $notification = array(
           'message' => 'Blog Category Inserted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->route('all.blog.category')->with($notification);
    }

    public function EditBlogCategory($id){
        $editblogcategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit_blog_category', compact('editblogcategory'));
    }

    public function UpdateBlogCategory(Request $request, $id){
       
        //$updateblogcategory_id = $request->id;
        $request->validate([ //Default Message for field is required

            'blog_category' => 'required'

         ],
         [
              //Custome Message Portfolio Name is Required
            'blog_category.required' => 'Category Name is Required',

         ]);
         BlogCategory::findorFail($id)->update([
            'blog_category' => $request->blog_category,
            'updated_at' => Carbon::now(),

       ]);
       $notification = array(
           'message' => 'Blog Category Updated Successfully',
           'alert-type' => 'success'
       );

       return redirect()->route('all.blog.category')->with($notification);
    }

    public function DeleteBlogCategory($id){

        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
