@extends('admin.master')
@section('admin')

{{-- Include SweetAlert for the delete confirmation --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="content">
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Blog Posts</h4>
            </div>
            <div class="ps-sm-3 mt-sm-0 mt-2">
                <a href="{{ route('blog.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Add New Post</a>
            </div>
        </div>

        <!-- Datatables -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset($item->image) }}" style="width: 70px; height: 40px; object-fit: cover;"></td>
                                    <td>{{ Str::limit($item->title, 400) }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>
                                        {{-- Added timezone correction for accurate status in Cambodia --}}
                                        @if ($item->published_at && \Carbon\Carbon::parse($item->published_at)->setTimezone('Asia/Phnom_Penh')->isPast())
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('blog.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        
                                        <form action="{{ route('blog.destroy', $item->id) }}" method="POST" class="d-inline" id="delete-form-{{ $item->id }}">
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

{{-- JavaScript to handle the SweetAlert delete confirmation --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Stop the form from submitting immediately
            
            const form = this.closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    });
});
</script>

@endsection
