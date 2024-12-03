@extends('layouts.app')

@section('title', 'Edit Banner')

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
                <h1>Edit Banner</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Banners</a></div>
                    <div class="breadcrumb-item">Edit</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Banner Details</h2>

                <div class="card">
                    <form method="POST" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Menggunakan metode PUT untuk update -->
                        <div class="card-header">
                            <h4>Edit Banner</h4>
                        </div>
                        <div class="card-body">
                            <!-- Title Input -->
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title" class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title', $banner->title) }}" required autofocus>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Image Upload Input -->
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input id="image" class="form-control @error('image') is-invalid @enderror" type="file" name="image" autofocus>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                
                                <!-- Display Existing Image -->
                                <div class="mt-4">
                                    <img src="{{ route('banner.image', ['path' => $banner->image]) }}" 
                                         alt="{{ $banner->title }}" 
                                         class="img-thumbnail"
                                         style="max-width: 150px; height: auto;">
                                    <p class="text-sm text-gray-600 mt-2">Current Image</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update Banner</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
