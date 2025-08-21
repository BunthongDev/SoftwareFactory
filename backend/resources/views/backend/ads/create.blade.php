@extends('admin.master')
@section('admin')

{{-- jQuery is required for the image preview script --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">
    <div class="container-xxl">
        <div class="py-3">
            {{-- Breadcrumbs or page title can go here --}}
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Add New Ad Banner</h5>
                        <a href="{{ route('admin.ads.manage') }}" class="btn btn-secondary">Back to List</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.ads.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-6">
                                <label for="title" class="form-label">Ad Title <span class="text-muted">(Optional)</span></label>
                                <input type="text" name="title" class="form-control" placeholder="e.g., Special Holiday Promotion">
                            </div>

                            <div class="col-md-6">
                                <label for="link_url" class="form-label">Link URL <span class="text-muted">(Optional)</span></label>
                                <input type="url" name="link_url" class="form-control" placeholder="https://example.com/promo-page">
                            </div>

                            <div class="col-md-6">
                                <label for="placement" class="form-label">Ad Placement</label>
                                <select name="placement" class="form-select" required>
                                    <option selected disabled value="">Choose a placement...</option>
                                    <option value="below_title">Below Post Title</option>
                                    <option value="in_content">In Middle of Content</option>
                                    <option value="sticky_footer">Sticky Footer</option>
                                    <option value="end_of_article">End of Article</option>
                                    <option value="popup">Popup Poster</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check form-switch mt-4 pt-2">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="isActiveCheck" checked>
                                    <label class="form-check-label" for="isActiveCheck">Is Active?</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="image_input" class="form-label">Ad Image</label>
                                <input type="file" name="image" class="form-control" id="image_input" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Image Preview</label>
                                <div class="d-flex align-items-center justify-content-center" style="min-height: 150px; border: 1px dashed #ced4da; border-radius: 0.25rem;">
                                    <img id="image_preview" src="{{ url('upload/no_image.jpg') }}" alt="Image Preview" style="max-width: 100%; max-height: 150px; object-fit: contain;">
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Save Ad</button>
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
        $('#image_input').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection
