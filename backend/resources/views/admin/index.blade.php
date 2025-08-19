@extends('admin.master')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
            </div>
        </div>

        <!-- "At a Glance" Statistics Row -->
        <div class="row">
            <!-- Total Blog Posts Card -->
            <div class="col-md-6 col-xl-3">
                <div class="card bg-primary text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fs-14 mb-1">Total Blog Posts</div>
                            <div class="fs-22 fw-semibold">{{ $totalBlogs }}</div>
                        </div>
                        <i data-feather="book-open" class="widgets-icons"></i>
                    </div>
                </div>
            </div>

            <!-- Total Services Card -->
            <div class="col-md-6 col-xl-3">
                <div class="card bg-success text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fs-14 mb-1">Total Services</div>
                            <div class="fs-22 fw-semibold">{{ $totalServices }}</div>
                        </div>
                        <i data-feather="briefcase" class="widgets-icons"></i>
                    </div>
                </div>
            </div>

            <!-- Total Case Studies Card -->
            <div class="col-md-6 col-xl-3">
                <div class="card bg-info text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fs-14 mb-1">Total Case Studies</div>
                            <div class="fs-22 fw-semibold">{{ $totalCaseStudies }}</div>
                        </div>
                        <i data-feather="file-text" class="widgets-icons"></i>
                    </div>
                </div>
            </div>

            <!-- Total Team Members Card -->
            <div class="col-md-6 col-xl-3">
                <div class="card bg-warning text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fs-14 mb-1">Total Team Members</div>
                            <div class="fs-22 fw-semibold">{{ $totalTeamMembers }}</div>
                        </div>
                        <i data-feather="users" class="widgets-icons"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- End "At a Glance" Row -->

        <!-- Recent Blog Posts Section -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Latest Blog Posts</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Date Published</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($latestBlogs as $blog)
                                    <tr>
                                        <td>{{ Str::limit($blog->title, 50) }}</td>
                                        <td>{{ $blog->category }}</td>
                                        <td>{{ $blog->published_at ? $blog->published_at->format('d M, Y') : 'Draft' }}</td>
                                        <td>
                                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No blog posts found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Recent Blog Posts Section -->

    </div> <!-- container-fluid -->
</div> <!-- content -->

@endsection
