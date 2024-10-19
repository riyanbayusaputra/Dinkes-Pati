@extends('layouts.app')

@section('title', 'Daftar FAQ')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar FAQ</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">FAQ</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Manajemen FAQ</h2>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4 text-right">
                    <a href="{{ route('faqs.create') }}" class="btn btn-primary">Tambah FAQ Baru</a>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Daftar FAQ</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Judul</th> <!-- Kolom untuk judul -->
                                        <th>Pertanyaan</th>
                                        <th>Jawaban</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $faq)
                                        <tr>
                                            <td>{{ $faq->title }}</td> <!-- Menampilkan judul FAQ -->
                                            <td>{{ $faq->question }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($faq->answers as $answer)
                                                        <li>{{ $answer->answer }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus FAQ ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
