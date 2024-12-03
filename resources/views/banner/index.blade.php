@extends('layouts.app')

@section('title', 'Banner List')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Banner List</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Banners</a></div>
                    <div class="breadcrumb-item">List</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Manage Banners</h2>

                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Add New Banner Button -->
                <div class="mb-4 text-right">
                    <a href="{{ route('banner.create') }}" class="btn btn-primary">Add New Banner</a>
                </div>

                <!-- Table List of Banners -->
                <div class="card">
                    <div class="card-header">
                        <h4>Banner List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($banners as $banner)
                                        <tr>
                                            <td>{{ $banner->title }}</td>
                                            <td>
                                                <img src="{{ route('banner.image', ['path' => $banner->image]) }}" alt="{{ $banner->title }}" class="img-fluid img-thumbnail" style="max-width: 100px;">
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column flex-sm-row">
                                                    <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-warning mb-2 mb-sm-0 mr-sm-2">Edit</a>
                                                    <form action="{{ route('banner.destroy', $banner->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No banners found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush
