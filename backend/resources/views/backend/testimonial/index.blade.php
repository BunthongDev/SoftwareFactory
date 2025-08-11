@extends('admin.master')
@section('admin')

<div class="content">
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Testimonials</h4>
            </div>
            <div class="ps-sm-3 mt-sm-0 mt-2">
                <a href="{{ route('testimonial.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Add New Testimonial</a>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Quote</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset($item->avatar) }}" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>{{ Str::limit($item->quote, 500) }}</td>
                                        <td>
                                            <a href="{{ route('testimonial.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('testimonial.destroy', $item->id) }}" method="POST" class="d-inline" id="delete-form-{{ $item->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-button">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
