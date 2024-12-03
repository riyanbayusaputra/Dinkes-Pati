@extends('layouts.app')

@section('title', 'Edit Kegiatan')

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
                <h1>Edit Kegiatan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Kegiatan</a></div>
                    <div class="breadcrumb-item">Edit</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Manajemen Kegiatan</h2>

                <div class="card">
                    <form method="POST" action="{{ route('activity-galleries.update', $activityGallery->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Menggunakan metode PUT untuk update -->
                        <div class="card-header">
                            <h4>Edit Kegiatan</h4>
                        </div>
                        <div class="card-body">
                            <!-- Input Judul Kegiatan -->
                            <div class="form-group">
                                <label for="activity_title">Judul Kegiatan</label>
                                <input type="text" class="form-control @error('activity_title') is-invalid @enderror"
                                    id="activity_title" name="activity_title" value="{{ old('activity_title', $activityGallery->activity_title) }}" required>
                                @error('activity_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Input Gambar -->
                            <div class="form-group">
                                <label for="image">Gambar (opsional)</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <!-- Menampilkan gambar yang sudah ada -->
                                @if($activityGallery->image)
                                    <div class="mt-4">
                                        <img src="{{ route('activity-gallery.image', ['path' => $activityGallery->image]) }}" alt="{{ $activityGallery->activity_title }}" class="w-40 h-auto">
                                        <p class="text-sm text-gray-600 mt-2">Gambar saat ini</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Input Deskripsi Kegiatan -->
                            <div class="form-group">
                                <label for="description">Deskripsi Kegiatan</label>
                                <textarea id="description" name="description" cols="30" rows="5"
                                    class="form-control border-slate-300 @error('description') is-invalid @enderror">{{ old('description', $activityGallery->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update Kegiatan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
