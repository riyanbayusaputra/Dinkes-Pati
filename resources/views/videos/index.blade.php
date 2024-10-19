@extends('layouts.app')

@section('title', 'Daftar Video')

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
                <h1>Daftar Video</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Videos</a></div>
                    <div class="breadcrumb-item">List</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">List of Videos</h2>

                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Semua Video</h4>
                        <div class="card-header-action">
                            <a href="{{ route('videos.create') }}" class="btn btn-primary">
                                Tambah Video Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Table List of Videos -->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>YouTube URL</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($videos as $video)
                                        <tr>
                                            <!-- Judul Video -->
                                            <td>{{ $video->title }}</td>

                                            <!-- YouTube URL -->
                                            <td>
                                                <a href="{{ $video->youtube_url }}" target="_blank">
                                                    {{ $video->youtube_url }}
                                                </a>
                                            </td>

                                            <!-- Aksi -->
                                            <td>
                                                <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-warning">
                                                    Edit
                                                </a>

                                                <form action="{{ route('videos.destroy', $video->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus video ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada video ditemukan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        {{-- {{ $videos->links() }} <!-- Pagination --> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush
