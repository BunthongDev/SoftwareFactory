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
                            <h5 class="card-title mb-0">Add New Client</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('client.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Client Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter client's name">
                                </div>

                                <div class="col-md-6">
                                    <label for="website_url" class="form-label">Website URL (Optional)</label>
                                    <input type="url" name="website_url" class="form-control" placeholder="e.g., https://example.com">
                                </div>

                                <div class="col-md-6">
                                    <label for="logo_input" class="form-label">Client Logo</label>
                                    <input type="file" name="logo" class="form-control" id="logo_input" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Logo Preview</label>
                                    <div class="d-flex align-items-center justify-content-center" style="min-height: 100px; border: 1px dashed #ced4da; border-radius: 0.25rem;">
                                        <img id="logo_preview" src="{{ url('upload/no_image.jpg') }}" alt="Logo Preview" style="max-width: 100%; max-height: 100px;">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Save Client</button>
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
            $('#logo_input').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#logo_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
