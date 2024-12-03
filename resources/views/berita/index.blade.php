@extends('layouts.app')

@section('title', 'Daftar Berita')

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
            <h1>Daftar Berita</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Berita</a></div>
                <div class="breadcrumb-item">Daftar</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Manajemen Berita</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Daftar Berita</h4>
                    <div class="card-header-action">
                        <a href="{{ route('berita.edit', 0) }}" class="btn btn-primary">Tambah Berita
                            Baru</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (Session::has('info'))
                    <div class="alert alert-info">
                        {{ Session::get('info') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Berita</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($berita as $activity)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $activity->activity_title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($activity->description, 50) }}</td>
                                    <td>
                                        @if ($activity->image)
                                        <img src="{{ route('berita.image', ['path' => $activity->image])  }}"
                                            alt="{{ $activity->activity_title }}" class="img-fluid"
                                            style="max-width: 100px;">
                                        @else
                                        <span>Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column flex-sm-row justify-content-start">
                                            <a href="{{ route('berita.edit', $activity->id) }}"
                                                class="btn btn-sm btn-warning mb-2 mb-sm-0 mr-sm-2">Edit</a>
                                            <form action="{{ route('berita.destroy', $activity->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus Berita ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada Berita yang ditemukan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer text-right">
                    {{ $activityGalleries->links() }}
                    <!-- Pagination -->
                </div> --}}
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
@endpush