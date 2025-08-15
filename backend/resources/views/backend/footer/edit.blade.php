@extends('admin.master')
@section('admin')


<div class="content">
    <div class="container-xxl">
        <div class="py-3">
            <h4 class="fs-18 fw-semibold m-0">Manage Footer Conten - Everything here can be optional</h4>
        </div>

        <form action="{{ route('footer.update') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                {{-- Left Column: Main Content --}}
                <div class="col-lg-8">
                    {{-- Brand Identity Section --}}
                    <div class="card">
                        <div class="card-header"><h5 class="card-title mb-0">Brand Identity</h5></div>
                        <div class="card-body row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Slogan</label>
                                <textarea name="slogan" class="form-control" rows="2" placeholder="e.g., Value your time by using great software.">{{ $footer->slogan }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Logo</label>
                                <input type="file" name="logo" class="form-control" id="logo_input">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Logo Preview</label>
                                <div class="bg-dark p-2 rounded">
                                    <img src="{{ asset($footer->logo) ?? url('upload/no_image.jpg') }}" id="logo_preview" style="max-width: 250px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Social Links Section --}}
                    <div class="card">
                        <div class="card-header"><h5 class="card-title mb-0">Social Media Links</h5></div>
                        <div class="card-body row g-3">
                            <div class="col-md-6"><label class="form-label">Facebook URL</label><input type="url" name="facebook_url" class="form-control" value="{{ $footer->facebook_url }}" placeholder="https://facebook.com/yourpage"></div>
                            <div class="col-md-6"><label class="form-label">LinkedIn URL</label><input type="url" name="linkedin_url" class="form-control" value="{{ $footer->linkedin_url }}" placeholder="https://linkedin.com/in/yourprofile"></div>
                            <div class="col-md-6"><label class="form-label">Telegram URL</label><input type="url" name="telegram_url" class="form-control" value="{{ $footer->telegram_url }}" placeholder="https://t.me/yourgroup"></div>
                            <div class="col-md-6"><label class="form-label">Instagram URL</label><input type="url" name="instagram_url" class="form-control" value="{{ $footer->instagram_url }}" placeholder="https://instagram.com/yourprofile"></div>
                            <div class="col-md-6"><label class="form-label">YouTube URL</label><input type="url" name="youtube_url" class="form-control" value="{{ $footer->youtube_url }}" placeholder="https://youtube.com/yourchannel"></div>
                        </div>
                    </div>
                </div>

                {{-- Right Column: CTA and Customization --}}
                <div class="col-lg-4">
                    {{-- CTA Section --}}
                    <div class="card">
                        <div class="card-header"><h5 class="card-title mb-0">Telegram CTA</h5></div>
                        <div class="card-body row g-3">
                            <div class="col-12"><label class="form-label">Title</label><input type="text" name="cta_title" class="form-control" value="{{ $footer->cta_title }}" placeholder="e.g., Join Our Telegram Group"></div>
                            <div class="col-12"><label class="form-label">Description</label><textarea name="cta_description" class="form-control" rows="2" placeholder="Enter a short description for the CTA">{{ $footer->cta_description }}</textarea></div>
                            <div class="col-12"><label class="form-label">Button Link</label><input type="url" name="cta_button_link" class="form-control" value="{{ $footer->cta_button_link }}" placeholder="https://t.me/your-telegram-link"></div>
                        </div>
                    </div>

                    {{-- Customization Section --}}
                    <div class="card">
                        <div class="card-header"><h5 class="card-title mb-0">Customization</h5></div>
                        <div class="card-body row g-3">
                            <div class="col-md-6"><label class="form-label">Background Color</label><input type="color" name="background_color" class="form-control form-control-color" value="{{ $footer->background_color }}"></div>
                            <div class="col-md-6"><label class="form-label">Font Color</label><input type="color" name="font_color" class="form-control form-control-color" value="{{ $footer->font_color }}"></div>
                            <div class="col-12"><label class="form-label">Copyright Text</label><input type="text" name="copyright_text" class="form-control" value="{{ $footer->copyright_text }}" placeholder="© 2025 Your Company. All Rights Reserved."></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save All Changes</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#logo_input').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){ 
                $('#logo_preview').attr('src', e.target.result); 
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
@endsection
