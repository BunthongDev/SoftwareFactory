@extends('admin.master')
@section('admin')



    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Menu Management</h4>
                </div>
            </div>

            {{-- The main form will wrap both cards and submit all data at once --}}
            <form action="{{ route('update.menu.settings') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- First Column: General Settings -->
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">General Settings</h5>
                            </div>
                            <div class="card-body">
                                <!-- Logo Upload -->
                                <div class="mb-3">
                                    <label for="logo_path" class="form-label">Menu Logo (480x200px)</label>
                                    <input class="form-control" type="file" id="logo_path" name="logo_path">
                                </div>
                                <div class="mb-3 text-center">
                                    <img id="logo-preview" src="{{ asset($settings->logo_path ?? 'upload/no_image.jpg') }}"
                                        alt="Logo Preview" class="img-thumbnail" style="max-height: 80px;">
                                </div>
                                <hr>
                                <!-- Consultancy Text -->
                                <div class="mb-3">
                                    <label for="consultancy_text" class="form-label">Consultancy Text</label>
                                    <input type="text" class="form-control" id="consultancy_text" name="consultancy_text"
                                        value="{{ $settings->consultancy_text ?? 'Free Consultancy' }}">
                                </div>
                                <!-- Phone Number -->
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                        value="{{ $settings->phone_number ?? '+123 456 789' }}">
                                </div>
                                <!-- Background Color -->
                                <div class="mb-3">
                                    <label for="background_color" class="form-label">Background Color</label>
                                    <input type="color" class="form-control form-control-color" id="background_color"
                                        name="background_color" value="{{ $settings->background_color ?? '#FFFFFF' }}"
                                        title="Choose your color">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Column: Menu Items -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Menu Items</h5>
                                <button type="button" id="add-menu-item" class="btn btn-primary btn-sm">Add New
                                    Item</button>
                            </div>
                            <div class="card-body">
                                <p class="card-subtitle text-muted">Drag and drop the items to reorder them.</p>
                                {{-- This list will be sortable --}}
                                <ul class="list-group mt-3" id="menu-items-list">
                                    @if (isset($menus) && count($menus) > 0)
                                        @foreach ($menus as $item)
                                            <li class="list-group-item d-flex align-items-center">
                                                <i data-feather="move" class="icon-sm me-2 text-muted drag-handle"
                                                    style="cursor: grab;"></i>
                                                <div class="flex-grow-1">
                                                    <div class="row g-2 align-items-center">
                                                        <div class="col-5">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="menus[{{ $item->id }}][label]"
                                                                placeholder="Label (e.g., Home)"
                                                                value="{{ $item->label }}">
                                                        </div>
                                                        <div class="col-5">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="menus[{{ $item->id }}][link]"
                                                                placeholder="Link (e.g., /about)"
                                                                value="{{ $item->link }}">
                                                        </div>
                                                        <div class="col-2 d-flex justify-content-end">
                                                            <div class="form-check form-switch me-2">
                                                                <input class="form-check-input" type="checkbox"
                                                                    role="switch" name="menus[{{ $item->id }}][status]"
                                                                    @if ($item->status) checked @endif>
                                                            </div>
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm p-1 remove-menu-item"><i
                                                                    data-feather="x" class="icon-xs"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="menus[{{ $item->id }}][order]"
                                                    class="menu-order" value="{{ $item->order }}">
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Save All Menu Settings</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Logo preview script
            $('#logo_path').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#logo-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });

            // SortableJS initialization
            const menuList = document.getElementById('menu-items-list');
            new Sortable(menuList, {
                animation: 150,
                handle: '.drag-handle', // Class of the element to use as a handle
                onEnd: function() {
                    // Update the hidden order input field for each item after dragging
                    $('#menu-items-list .list-group-item').each(function(index) {
                        $(this).find('.menu-order').val(index);
                    });
                }
            });

            // Add new menu item
            $('#add-menu-item').click(function() {
                // A unique key for the new item's form fields
                const newKey = 'new_' + new Date().getTime();
                const newItemHtml = `
            <li class="list-group-item d-flex align-items-center">
                <i data-feather="move" class="icon-sm me-2 text-muted drag-handle" style="cursor: grab;"></i>
                <div class="flex-grow-1">
                    <div class="row g-2 align-items-center">
                        <div class="col-5">
                            <input type="text" class="form-control form-control-sm" name="menus[${newKey}][label]" placeholder="Label">
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control form-control-sm" name="menus[${newKey}][link]" placeholder="Link">
                        </div>
                        <div class="col-2 d-flex justify-content-end">
                            <div class="form-check form-switch me-2">
                                <input class="form-check-input" type="checkbox" role="switch" name="menus[${newKey}][status]" checked>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm p-1 remove-menu-item"><i data-feather="x" class="icon-xs"></i></button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="menus[${newKey}][order]" class="menu-order" value="${$('#menu-items-list .list-group-item').length}">
            </li>
        `;
                $('#menu-items-list').append(newItemHtml);
                feather.replace(); // Re-render Feather icons for the new item
            });

            // Remove menu item
            $(document).on('click', '.remove-menu-item', function() {
                $(this).closest('.list-group-item').remove();
                // Re-calculate order after removing an item
                $('#menu-items-list .list-group-item').each(function(index) {
                    $(this).find('.menu-order').val(index);
                });
            });
        });
    </script>










@endsection
