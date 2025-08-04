@extends('admin.master')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">All Service</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <a href="{{ route('add.service') }}" class="btn btn-primary">Add Service</a>
                    </ol>
                </div>
            </div>

            <!-- Datatables  -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">*</h5>
                        </div>

                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Heading</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Loop through each service item --}}
                                    @foreach ($service as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->heading }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ Str::limit($item->description, 300, '...') }}</td>
                                            <td>
                                                {{-- Display icon as image or class --}}
                                                @if ($item->icon)
                                                    {{-- If icon is an image path --}}
                                                    @if (Str::endsWith($item->icon, ['.png', '.jpg', '.jpeg', '.svg', '.gif']))
                                                        <img src="{{ asset($item->icon) }}" alt="icon"
                                                            style="width:32px;height:32px;">
                                                    @else
                                                        {{-- If icon is a font icon class --}}
                                                        <i class="{{ $item->icon }}"></i>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.service', $item->id) }}"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <a href="{{ route('delete.service', $item->id) }}"
                                                    class="btn btn-danger btn-sm" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>










        </div> <!-- container-fluid -->

    </div> <!-- content -->
@endsection
