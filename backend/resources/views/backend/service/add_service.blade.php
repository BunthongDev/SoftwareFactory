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
                            <h5 class="card-title mb-0">All Service</h5>
                        </div><!-- end card header -->

                        <div class="card-body">

                            <form action="{{ route('store.service') }}" method="post" class="row g-3">
                                @csrf
                                
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Service Title</label>
                                    <input type="text" name="title" class="form-control"
                                        placeholder="Enter service title" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Service Description (Optional)</label>
                                    <textarea name="description" class="form-control" placeholder="Enter service description "></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="icon" class="form-label">Service Icon (Optional)</label>
                                    <input type="text" name="icon" class="form-control" id="icon_input"
                                        placeholder="Example: 'ph-duotone ph-headphones' (Duotone weight) or 'path/to/image.png'">
                                    <!-- If you want to allow image upload for icon, use type="file" and handle in controller -->
                                </div>
                                
                                 {{-- New Icon Preview Area --}}
                                <div class="col-md-6">
                                    <label class="form-label">Icon Preview</label>
                                    <div class="d-flex align-items-center justify-content-center" style="font-size: 4rem; min-height: 100px; border: 1px dashed #ced4da; border-radius: 0.25rem;">
                                        <i id="icon_preview"></i>
                                    </div>
                                </div>
                               
                                
                                <div class="col-md-6">
                                    <label for="order" class="form-label">Display Order</label>
                                    <input type="number" name="order" class="form-control"
                                        placeholder="Enter display order (Optional)">
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


         {{-- Include jQuery --}}
   
         {{-- NEW JavaScript for live icon class preview --}}
    <script type="text/javascript">
        $(document).ready(function() {
            // When the user types in the icon input field
            $('#icon_input').on('keyup', function() {
                // Get the new class name from the input field
                var newClassName = $(this).val();
                
                // Update the preview <i> tag's class attribute
                $('#icon_preview').attr('class', newClassName);
            });
        });
    </script>
    
    @endsection
