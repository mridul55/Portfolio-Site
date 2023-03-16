@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body ">

                        <h4 class="card-title">Add Blog</h4>
            <form action="{{ route('store.blog') }}" method="post" enctype="multipart/form-data">
                @csrf
            

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category</label>
                    <div class="col-sm-10">
                        <select name="blog_category_id" class="form-select" aria-label="Default select example">
                           
                            <option selected="">Selete Category</option>
                            @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->blog_category }}</option>
                            @endforeach   
                           
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="blog_title"  id="title">
                        @error('blog_title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="blog_tags" value="home,tech" data-role="tagsinput">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                    <div class="col-sm-10">
                        
                        <textarea name="blog_description" id="elm1" ></textarea>
                    </div>
                </div>
              
               
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="blog_image"  id="image">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                    <div class="col-sm-10">
                    <img id="showImage" class="rounded avatar-xl" 
                    {{-- @php
                        if($aboutpage->about_image != ""){
                            src=url($aboutpage->about_image)
                        }else{
                            src=url('upload/no_image');""
                        }
                    @endphp --}} 
                    src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                    </div>
                </div>
              
                <div class="row mb-3"> 
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                    <input type="submit" class="btn btn-info" value="Add Blog Data">
                    </div>
                </div>
            </form>
                      
                        <!-- end row -->
                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

<script type="text/javascript">

 $(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
 })

</script>



@endsection


