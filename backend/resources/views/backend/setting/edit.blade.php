@extends('admin.master')
@section('admin')

{{-- jQuery is required for the image preview scripts --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">
    <div class="container-xxl">
        <div class="py-3">
            <h4 class="fs-18 fw-semibold m-0">Manage Site Settings</h4>
        </div>

        <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">General Site Settings</h5>
                </div>
                <div class="card-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Site Title</label>
                        <input type="text" name="site_title" class="form-control" value="{{ $setting->site_title }}" placeholder="e.g., Anajak Software">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Site Tagline</label>
                        <input type="text" name="site_tagline" class="form-control" value="{{ $setting->site_tagline }}" placeholder="e.g., Building the Future of Software">
                    </div>

                    <hr class="my-3">

                    <div class="col-md-6">
                        <label class="form-label">Main Logo</label>
                        <input type="file" name="logo" class="form-control" id="logo_input">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Logo Preview</label>
                        <div class="bg-dark p-2 rounded d-inline-block">
                            <img src="{{ asset($setting->logo) ?? url('upload/no_image.jpg') }}" id="logo_preview" style="max-height: 60px;">
                        </div>
                    </div>

                    <hr class="my-3">

                    <div class="col-md-6">
                        <label class="form-label">Favicon (.ico or .png)</label>
                        <input type="file" name="favicon" class="form-control" id="favicon_input">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Favicon Preview</label>
                        <div>
                            <img src="{{ asset($setting->favicon) ?? url('upload/no_image.jpg') }}" id="favicon_preview" style="max-width: 32px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save Settings</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Logo preview
        $('#logo_input').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){ 
                $('#logo_preview').attr('src', e.target.result); 
            }
            reader.readAsDataURL(e.target.files[0]);
        });

        // Favicon preview
        $('#favicon_input').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){ 
                $('#favicon_preview').attr('src', e.target.result); 
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
@endsection
