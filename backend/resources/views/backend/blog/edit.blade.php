@extends('admin.master')
@section('admin')

{{-- jQuery is required for the image preview scripts --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{-- UPDATED: New TinyMCE script from your snippet --}}
<script src="https://cdn.tiny.cloud/1/iy88y3uptlb8z04w36zu58bjw0kyht0a0h05yviaf5hyl3jk/tinymce/8/tinymce.min.js" referrerpolicy="origin"></script>

<div class="content">
    <div class="container-xxl">
        <div class="py-3">
            {{-- Breadcrumbs or page title can go here --}}
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Blog Post</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('blog.update', $blog->id) }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="col-md-8">
                                <label for="title" class="form-label">Post Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                            </div>

                            <div class="col-md-4">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" name="category" class="form-control" value="{{ $blog->category }}" required>
                            </div>

                            <div class="col-md-12">
                                <label for="tags" class="form-label">Tags (Comma Separated) - optional</label>
                                <input type="text" name="tags" class="form-control" value="{{ $blog->tags }}">
                            </div>

                            <div class="col-md-12">
                                <label for="excerpt" class="form-label">Excerpt / Short Description - optional</label>
                                <textarea name="excerpt" class="form-control" rows="3">{{ $blog->excerpt }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="content" class="form-label">Full Content - optional</label>
                                <textarea name="content" class="form-control" id="content_editor" rows="10">{{ $blog->content }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="image_input" class="form-label">Main Feature Image</label>
                                <input type="file" name="image" class="form-control" id="image_input">
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">Current Image Preview</label>
                                <div class="d-flex align-items-center justify-content-center" style="min-height: 150px; border: 1px dashed #ced4da; border-radius: 0.25rem;">
                                    <img id="image_preview" src="{{ asset($blog->image) }}" alt="Image Preview" style="max-width: 100%; max-height: 150px;">
                                </div>
                            </div>

                            <hr class="my-4">

                             <div class="col-md-4">
                                <label for="author_name" class="form-label">Author Name</label>
                                <input type="text" name="author_name" class="form-control" value="{{ $blog->author_name }} " required>
                            </div>

                            <div class="col-md-4">
                                <label for="published_at" class="form-label">Publish Date - optional</label>
                                <input type="datetime-local" name="published_at" class="form-control" value="{{ $blog->published_at }}">
                            </div>

                            <div class="col-md-6">
                                <label for="avatar_input" class="form-label">Author Avatar - optional</label>
                                <input type="file" name="author_avatar" class="form-control" id="avatar_input">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Current Avatar Preview</label>
                                <div class="d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; border: 1px dashed #ced4da; border-radius: 50%;">
                                    <img id="avatar_preview" src="{{ asset($blog->author_avatar) ?? url('upload/no_image.jpg') }}" alt="Avatar Preview" style="max-width: 100%; max-height: 100px; border-radius: 50%;">
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Update Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript for live image previews --}}
<script type="text/javascript">
    $(document).ready(function() {
        // Main image preview
        $('#image_input').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });

        // Author avatar preview
        $('#avatar_input').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#avatar_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

{{-- UPDATED: New, advanced TinyMCE initialization script --}}
<script>
  tinymce.init({
    selector: 'textarea#content_editor',
    plugins: 'anchor autolink charmap codesample emoticons link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange formatpainter pageembed a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown importword exportword exportpdf',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    
    // Added Battambang to the font list
    font_family_formats: 'Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Battambang=battambang,sans-serif; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats',
    
    // Added the Google Font link for Battambang
    content_css: 'https://fonts.googleapis.com/css2?family=Battambang:wght@400;700&display=swap',

    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
  });
</script>
@endsection
