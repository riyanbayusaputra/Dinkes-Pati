@extends('layouts.app')

@section('title', 'Daftar Video Banner')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Video Banner</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Video Banner</a></div>
                    <div class="breadcrumb-item">Daftar</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Video Banner</h2>

                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Video Banner</h4>
                        <div class="card-header-action">
                            <a href="{{ route('video_banners.create') }}" class="btn btn-primary">Tambah Video Banner</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videoBanners as $index => $videoBanner)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $videoBanner->file_name }}</td>
                                    <td>
                                        <a href="{{ route('video_banners.edit', $videoBanner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('video_banners.destroy', $videoBanner->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
