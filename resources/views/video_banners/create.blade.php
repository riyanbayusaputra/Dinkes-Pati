@extends('layouts.app')

@section('title', 'Tambah Video Banner')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Video Banner</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Video Banner</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Tambah Video Banner</h2>

            <div class="card">
                <form method="POST" action="{{ route('video_banners.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4>Form Tambah Video Banner</h4>
                    </div>
                    <div class="card-body">
                        <!-- File Video -->
                        <div class="form-group">
                            <label for="file_name">File Video</label>
                            <input type="file" class="form-control @error('file_name') is-invalid @enderror" name="file_name" required accept=".mp4, .avi, .mkv, .mov">
                            <small class="form-text text-muted">Format yang diperbolehkan: mp4, avi, mkv, mov</small>
                            @error('file_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Simpan Video Banner</button>
                        <a href="{{ route('video_banners.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
