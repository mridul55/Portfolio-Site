@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body ">

                        <h4 class="card-title">Edit Test Page</h4>
                        <form action="{{ route('update.test.page',$editTest->id) }}"  method="post">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Name</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" type="text"  name="name" value="{{ $editTest->name }}" >
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Address </label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" type="text"  name="address" value="{{ $editTest->address }}" >
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" type="text"  name="phone" value="{{ $editTest->phone }}" >
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-info" value="Update Test Page">
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

    $(document).ready(function (){
        $('#myForm').validate({
            rules:{
                blog_category:{
                   required : true,
                },
            },
            messages : {
                blog_category:{
                    required: 'Please Enter Test Page Name',
                },
            },
            errorElement : 'span',
            errorPlacement : function(error,element){
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },

        })
    })



</script> --}}



@endsection
