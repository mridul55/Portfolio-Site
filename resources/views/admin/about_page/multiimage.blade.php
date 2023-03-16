@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body ">

                        <h4 class="card-title">Add Multi Image</h4> <br>
            <form action="{{ route('store.multi.image') }}" method="post" enctype="multipart/form-data">
                @csrf
           
               
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">About Multi Image</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="file" name="multi_image[]"  id="image" multiple="">
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
                    src="{{  url('upload/no_image.jpg') }}" alt="Card image cap">
                    </div>
                </div>
                <div class="row mb-3"> 
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                    <input type="submit" class="btn btn-info" value="Add Multi image Slide">
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


