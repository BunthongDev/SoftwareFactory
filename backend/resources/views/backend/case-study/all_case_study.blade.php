@extends('admin.master')
@section('admin')
    <div class="content">

        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">All Case Studies</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                         {{-- Link to the page for adding a new case study --}}
                        <a href="{{ route('add.casestudy') }}" class="btn btn-primary">Add Case Study</a>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">Case Study Information</h5>
                        </div>

                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Loop through each case study item passed from the controller --}}
                                    @foreach ($casestudies as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($item->image) }}" alt="Case Study Image" style="width:100px; height:70px; object-fit: cover;">
                                            </td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                {{-- Limit the description length for a cleaner table display --}}
                                                {{ Str::limit($item->description, 150, '...') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.casestudy', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                <a href="{{ route('delete.casestudy', $item->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div> </div> @endsection