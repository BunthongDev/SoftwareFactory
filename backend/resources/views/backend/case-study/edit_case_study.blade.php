@extends('admin.master')
@section('admin')
    <div class="content">

        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                {{-- Breadcrumbs or page title can go here --}}
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Edit Case Study</h5>
                        </div>
                        <div class="card-body">

                            {{-- The form points to the 'update.casestudy' route, passing the case study ID --}}
                            <form action="{{ route('update.casestudy', $casestudy->id) }}" method="post" class="row g-3"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- A hidden field to pass the ID, good practice though Laravel gets it from the route --}}
                                <input type="hidden" name="id" value="{{ $casestudy->id }}">


                                <div class="col-md-12">
                                    <label for="title" class="form-label">Case Study Title</label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ $casestudy->title }}">
                                </div>


                                <div class="col-md-12">
                                    <label for="description" class="form-label">Case Study Description</label>
                                    <textarea name="description" class="form-control" placeholder="Enter Case Study Description">{{ $casestudy->description }}</textarea>
                                </div>


                                <div class="col-md-6">
                                    <label for="image" class="form-label">Case Study Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>

                                {{-- Area to preview the current or newly selected image --}}
                                <div class="col-md-6">
                                    <img id="ShowImage" src="{{ asset($casestudy->image) }}"
                                        style="width: 200px; height: auto; border: 1px solid #ddd; padding: 5px;"
                                        alt="Case Study Image">
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
    
    
    
    {{-- This script provides the live preview for the image input --}}
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
