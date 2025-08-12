@extends('admin.master')
@section('admin')
    

    <div class="content">
        <div class="container-xxl">
            <div class="py-3">
                {{-- Breadcrumbs or page title can go here --}}
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Edit Testimonial</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('testimonial.update', $testimonial->id) }}" method="post" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Client Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="role" class="form-label">Client Role / Company</label>
                                    <input type="text" name="role" class="form-control" value="{{ $testimonial->role }}" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="quote" class="form-label">Quote</label>
                                    <textarea name="quote" class="form-control" rows="4" required>{{ $testimonial->quote }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label for="avatar_input" class="form-label">Client Avatar (96x96 px)</label>
                                    <input type="file" name="avatar" class="form-control" id="avatar_input">
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Current Avatar Preview</label>
                                    <div class="d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; border: 1px dashed #ced4da; border-radius: 0.25rem;">
                                        <img id="avatar_preview" src="{{ asset($testimonial->avatar) }}" alt="Avatar Preview" style="max-width: 100%; max-height: 100px;">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Update Testimonial</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JavaScript for live image preview --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#avatar_input').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#avatar_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
