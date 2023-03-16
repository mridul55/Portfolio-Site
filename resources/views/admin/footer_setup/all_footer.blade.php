@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body ">

                        <h4 class="card-title">Footer Page</h4>
                        <form action="{{ route('update.footer', $allfooter->id) }}"
                            method="post">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="number" id="number"
                                        value="{{ $allfooter->number }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short
                                    Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" type="text" name="short_description"
                                        id="short_description"
                                        rows="5"> {{ $allfooter->short_description }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="address" id="address"
                                        value="{{ $allfooter->address }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" name="email" id="email"
                                        value="{{ $allfooter->email }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">facebook</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="facebook" id="facebook"
                                        value="{{ $allfooter->facebook }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">twitter</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="twitter" id="twitter"
                                        value="{{ $allfooter->twitter }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">copyright</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="copyright" id="copyright"
                                        value="{{ $allfooter->copyright }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-info" value="Update Footer Page">
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
