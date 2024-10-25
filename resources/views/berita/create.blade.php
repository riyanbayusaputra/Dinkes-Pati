@extends('layouts.app')

@section('title', 'Tambah Berita Baru')

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
            <h1>Tambah Berita Baru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/berita">Berita</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Manajemen Berita</h2>

            <div class="card">
                <form method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" id="id" value="{{$x ? $x->id : ''}}" hidden>
                    <div class="card-header">
                        <h4>Tambah Berita Baru</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="activity_title">Judul Berita</label>
                            <input type="text" class="form-control @error('activity_title') is-invalid @enderror"
                                id="activity_title" name="activity_title"
                                value="{{ $x ? $x->activity_title : old('activity_title') }}" required>
                            @error('activity_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/png, image/jpeg">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi Berita</label>
                            <textarea id="description" name="description" cols="30" rows="5"
                                class="form-control border-slate-300 @error('description') is-invalid @enderror">{{ $x ? $x->description : old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Tambah Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
@endpush