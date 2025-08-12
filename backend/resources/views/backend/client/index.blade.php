@extends('admin.master')
@section('admin')

<div class="content">
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Clients</h4>
            </div>
            <div class="ps-sm-3 mt-sm-0 mt-2">
                <a href="{{ route('client.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Add New Client</a>
            </div>
        </div>

        <!-- Datatables -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- UPDATED: The table now uses the "datatable" ID just like your slider page --}}
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Website URL</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset($item->logo) }}" style="width: 120px; height: 40px; object-fit: contain;"></td>
                                    <td>{{ $item->name }}</td>
                                    <td><a href="{{ $item->website_url }}" target="_blank">{{ $item->website_url }}</a></td>
                                    <td>
                                        <a href="{{ route('client.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        
                                        <form action="{{ route('client.destroy', $item->id) }}" method="POST" class="d-inline" id="delete-form-{{ $item->id }}">
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

@endsection
