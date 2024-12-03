@extends('layouts.app')

@section('title', 'Edit Dokumen')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Dokumen</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">E-Library</a></div>
                    <div class="breadcrumb-item">Edit</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Dokumen "{{ $document->title }}"</h2>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Judul Dokumen</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $document->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="penyusun">Penyusun</label>
                                <input type="text" name="penyusun" class="form-control @error('penyusun') is-invalid @enderror" value="{{ old('penyusun', $document->penyusun) }}" required>
                                @error('penyusun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $document->tahun) }}" required>
                                @error('tahun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $document->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="file">Pilih File Baru (Optional)</label>
                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                                <small>File saat ini: <a href="{{ route('documents.showFile', ['id' => $document->id]) }}" target="_blank">{{ $document->file }}</a></small>
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Dokumen</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
