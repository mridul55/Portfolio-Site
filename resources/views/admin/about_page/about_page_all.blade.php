@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body ">

                        <h4 class="card-title">About Page</h4>
            <form action="{{ route('about.update') }}" method="post" enctype="multipart/form-data">
                @csrf
            <input type="hidden" name="id" value="{{ $aboutpage->id }}">

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="title"  id="title" value="{{ $aboutpage->title }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="short_title"  id="short_title" value="{{ $aboutpage->short_title }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" type="text" name="short_description"  id="short_description"  rows="5"> {{ $aboutpage->short_description }}</textarea>
                       
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="long_description"> {{ $aboutpage->long_description }}</textarea>
                    </div>
                </div>
               
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="about_image"  id="image">
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
                    src="{{ (!empty($aboutpage->about_image))? url($aboutpage->about_image):url('upload/no_image') }}" alt="Card image cap">
                    </div>
                </div>
                <div class="row mb-3"> 
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                    <input type="submit" class="btn btn-info" value="Update Slide">
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


