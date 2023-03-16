@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body ">

                        <h4 class="card-title">Edit Blog Category</h4>
                        <form action="{{ route('update.blog.category', $editblogcategory->id) }}" method="post">
                            @csrf
                            
                            {{-- <input type="hidden" name="id" value="{{ $editblogcategory->id }}"> --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                 <input class="form-control" type="text" name="blog_category" id="name" value="{{ $editblogcategory->blog_category }}">
                                    @error('blog_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-info" value="Update Blog Category">
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

{{-- <script type="text/javascript">

 $(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
 })

</script> --}}



@endsection
