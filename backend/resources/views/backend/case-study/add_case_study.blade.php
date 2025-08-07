@extends('admin.master')
@section('admin')
    

    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                {{-- Breadcrumbs or page title can go here --}}
            </div>

            <!-- Form Validation -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Add New Case Study</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            {{-- The form points to the 'store.casestudy' route --}}
                            <form action="{{ route('store.casestudy') }}" method="post" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                
                                {{-- This field matches the 'title' column in your migration --}}
                                <div class="col-md-12">
                                    <label for="title" class="form-label">Case Study Title</label>
                                    <input type="text" name="title" class="form-control"
                                        placeholder="Enter case study title" required>
                                </div>

                                {{-- This field matches the 'description' column in your migration --}}
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Case Study Description (Optional)</label>
                                    <textarea name="description" class="form-control" placeholder="Enter case study description"></textarea>
                                </div>

                                {{-- This field matches the 'image' column in your migration --}}
                                <div class="col-md-6">
                                    <label for="image_input" class="form-label">Case Study Image ( 500x350px )</label>
                                    <input type="file" name="image" class="form-control" id="image_input" required>
                                </div>
                                
                                {{-- Image Preview Area --}}
                                <div class="col-md-6">
                                    <label class="form-label">Image Preview</label>
                                    <div class="d-flex align-items-center justify-content-center" style="min-height: 150px; border: 1px dashed #ced4da; border-radius: 0.25rem;">
                                        {{-- The preview image will be shown here --}}
                                        <img id="image_preview" src="{{ url('upload/no_image.jpg') }}" alt="Image Preview" style="max-width: 100%; max-height: 150px;">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Save Case Study</button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-xxl -->
    </div> <!-- content -->

    
    {{-- NEW JavaScript for live image preview --}}
    <script type="text/javascript">
        $(document).ready(function() {
            // Listen for a change on the file input field
            $('#image_input').change(function(e) {
                // Create a URL for the selected file
                var reader = new FileReader();
                reader.onload = function(e) {
                    // Set the 'src' attribute of the image tag to the new URL
                    $('#image_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
