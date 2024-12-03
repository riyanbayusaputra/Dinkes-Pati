@extends('layouts.app')

@section('title', 'Daftar Dokumen')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Dokumen</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Dokumen</a></div>
                    <div class="breadcrumb-item">Daftar</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Manajemen Dokumen</h2>

                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Add New Document Button -->
                <div class="mb-4 text-right">
                    <a href="{{ route('documents.create') }}" class="btn btn-primary">Tambah Dokumen Baru</a>
                </div>

                <!-- Table List of Documents -->
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Dokumen</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Penyusun</th>
                                        <th>Tahun</th>
                                        <th>Deskripsi</th>
                                        <th>File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($documents as $document)
                                        <tr>
                                            <td>{{ $document->title }}</td>
                                            <td>{{ $document->penyusun }}</td>
                                            <td>{{ $document->tahun }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($document->description, 50) }}</td>
                                            <td>
                                                <a href="{{ route('documents.showFile', ['id' => $document->id]) }}" target="_blank" class="btn btn-link">Lihat</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada dokumen yang ditemukan.</td>
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
