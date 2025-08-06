@extends('admin.master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                

                
            </div>

            <!-- Form Validation -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">All Slider</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            
        <form action="{{ route('store.slider') }}" method="post" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="validationDefault01" class="form-label">Slider Heading</label>
                <input type="text" name="heading" class="form-control" placeholder="Enter slider heading (Optional)">
            </div>
            
             <div class="col-md-6">
                <label for="validationDefault01" class="form-label">Slider Link</label>
                <input type="text" name="link" class="form-control" placeholder="Enter Slider Link" required>
            </div>
            
            <div class="col-md-12">
                <label for="validationDefault01" class="form-label">Slider Description</label>
                <textarea name="description" class="form-control" placeholder="Enter Slider Description (Optional)"></textarea>
            </div>
            
            <div class="col-md-6">
                <label for="validationDefault01" class="form-label">Slider Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="col-md-6">
                 <img id="ShowImage" src="{{ url('upload/no_image.jpg') }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image slider ">

            </div>
            
            
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
        </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->



            </div> <!-- container-fluid -->

        </div>
        
        {{-- // previewing an uploaded image before submitting the form --}}
        <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#ShowImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
        
    </script>
        
    @endsection
