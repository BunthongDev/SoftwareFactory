@extends('admin.master')
@section('admin')


<div class="content">
    <div class="container-xxl">
        <div class="py-3">
            <h4 class="fs-18 fw-semibold m-0">Manage Contact Us Page</h4>
        </div>

        <form action="{{ route('contact-us.update') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- Main Page Content Section --}}
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Main Page Content</h5>
                </div>
                <div class="card-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Page Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $page->title }}" placeholder="e.g., Get in Touch">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Page Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter a short description for the contact page">{{ $page->description }}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Google Maps Embed URL</label>
                        <textarea name="map_url" class="form-control" rows="4" placeholder="Paste the full <iframe> code from Google Maps here">{{ $page->map_url }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Contact Links Section --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Contact Links</h5>
                    <button type="button" class="btn btn-success btn-sm" id="add-contact-link">Add Link</button>
                </div>
                <div class="card-body" id="contact-links-container">
                    @foreach ($contactLinks as $link)
                        <div class="row g-3 mb-3 border p-3 rounded position-relative contact-link-row">
                            <input type="hidden" name="links[{{ $link->id }}][id]" value="{{ $link->id }}">
                            <div class="col-md-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="links[{{ $link->id }}][title]" class="form-control" value="{{ $link->title }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Detail</label>
                                <input type="text" name="links[{{ $link->id }}][detail]" class="form-control" value="{{ $link->detail }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Link URL (href)</label>
                                <input type="url" name="links[{{ $link->id }}][href]" class="form-control" value="{{ $link->href }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Icon Class</label>
                                <input type="text" name="links[{{ $link->id }}][icon_class]" class="form-control" value="{{ $link->icon_class }}" placeholder="e.g., Envelope">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Hover Color</label>
                                <input type="text" name="links[{{ $link->id }}][hover_color]" class="form-control" value="{{ $link->hover_color }}" placeholder="e.g., hover:bg-blue-600">
                            </div>
                             <div class="col-md-2">
                                <label class="form-label">Order</label>
                                <input type="number" name="links[{{ $link->id }}][order]" class="form-control" value="{{ $link->order }}">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="links[{{ $link->id }}][is_visible]" value="1" @if($link->is_visible) checked @endif>
                                    <label class="form-check-label">Visible</label>
                                </div>
                            </div>
                            <div class="position-absolute top-0 end-0 p-2">
                                <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
                                <input type="hidden" name="links[{{ $link->id }}][delete]" class="delete-flag" value="0">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save All Changes</button>
            </div>
        </form>
    </div>
</div>

{{-- Template for a new contact link row --}}
<div id="contact-link-template" style="display: none;">
    <div class="row g-3 mb-3 border p-3 rounded position-relative contact-link-row">
        <div class="col-md-3">
            <label class="form-label">Title</label>
            <input type="text" name="links[new_0][title]" class="form-control">
        </div>
        <div class="col-md-3">
            <label class="form-label">Detail</label>
            <input type="text" name="links[new_0][detail]" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Link URL (href)</label>
            <input type="url" name="links[new_0][href]" class="form-control">
        </div>
        <div class="col-md-3">
            <label class="form-label">Icon Class</label>
            <input type="text" name="links[new_0][icon_class]" class="form-control" placeholder="e.g., Envelope">
        </div>
        <div class="col-md-3">
            <label class="form-label">Hover Color</label>
            <input type="text" name="links[new_0][hover_color]" class="form-control" placeholder="e.g., hover:bg-blue-600">
        </div>
        <div class="col-md-2">
            <label class="form-label">Order</label>
            <input type="number" name="links[new_0][order]" class="form-control" value="0">
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="links[new_0][is_visible]" value="1" checked>
                <label class="form-check-label">Visible</label>
            </div>
        </div>
        <div class="position-absolute top-0 end-0 p-2">
            <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
            <input type="hidden" name="links[new_0][delete]" class="delete-flag" value="0">
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        let linkIndex = 0;
        $('#add-contact-link').click(function() {
            let template = $('#contact-link-template').html().replace(/new_0/g, 'new_' + linkIndex);
            $('#contact-links-container').append(template);
            linkIndex++;
        });

        // Logic to "soft delete" a row
        $(document).on('click', '.remove-row', function() {
            let row = $(this).closest('.contact-link-row');
            row.find('.delete-flag').val('1');
            row.hide();
        });
    });
</script>
@endsection
