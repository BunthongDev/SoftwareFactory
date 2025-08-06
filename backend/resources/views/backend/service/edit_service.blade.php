@extends('admin.master')
@section('admin')
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Edit Service</h5>
                        </div>
                        <div class="card-body">

                            {{-- Removed enctype="multipart/form-data" as it is not needed --}}
                            <form action="{{ route('update.service', $service->id) }} " method="post" class="row g-3 ">
                                @csrf
                                <input type="hidden" name="id" value="{{ $service->id }}">

                                <div class="col-md-6">
                                    <label for="title" class="form-label">Service Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="order" class="form-label">Display Order (Optional)</label>
                                    <input type="number" name="order" class="form-control" value="{{ $service->order }}">
                                </div>

                                <div class="col-md-12">
                                    <label for="description" class="form-label">Service Description (Optional)</label>
                                    <textarea name="description" class="form-control" rows="3">{{ $service->description }}</textarea>
                                </div>

                                {{-- Input is type="text" for the icon class --}}
                                <div class="col-md-6">
                                    <label for="icon_input" class="form-label">Service Icon Class</label>
                                    <input type="text" name="icon" class="form-control" id="icon_input" placeholder="e.g., ph-duotone ph-device-mobile" value="{{ $service->icon }}">
                                </div>

                                {{-- Icon preview area using an <i> tag --}}
                                <div class="col-md-6">
                                    <label class="form-label">Icon Preview</label>
                                    <div class="d-flex align-items-center justify-content-center" style="font-size: 4rem; min-height: 100px; border: 1px dashed #ced4da; border-radius: 0.25rem;">
                                        <i id="icon_preview" class="{{ $service->icon }}"></i>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    
    
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