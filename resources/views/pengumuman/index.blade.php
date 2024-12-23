@extends('layouts.app')

@section('title', 'Daftar Pengumuman')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Pengumuman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Pengumuman</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Manajemen Pengumuman</h2>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="mb-4 text-right">
                <a href="{{ route('datapengumuman.create') }}" class="btn btn-primary">Tambah Pengumuman Baru</a>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Daftar Pengumuman</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="datatable1_wrapper">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>PDF</th>
                                    <th>Gambar</th>
                                    <th>Tanggal</th>
                                    <th>Pengumuman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                <tr>
                                    <td>
                                        {{$faq->judul}}
                                    </td>
                                    <td>
                                        @if ($faq->pdf)
                                        <a href="{{ route('pengumuman.image', ['path' => $faq->pdf])  }}"
                                            target="_blank" class="btn btn-info btn-sm">Download</a>
                                        @else
                                        <span>Tidak ada dokumen</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($faq->image)
                                        <img src="{{ route('pengumuman.image', ['path' => $faq->image])  }}"
                                            alt="{{ $faq->keterangan }}" class="img-fluid" style="max-width: 100px;">
                                        @else
                                        <span>Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($faq->mulai)->locale('id')->isoFormat('dddd, D MMMM
                                        Y')}} - {{ \Carbon\Carbon::parse($faq->selesai)->locale('id')->isoFormat('dddd,
                                        D MMMM
                                        Y') }}
                                    </td>
                                    <td>{{ $faq->keterangan }}</td>

                                    <td>
                                        <a href="{{ route('datapengumuman.edit', $faq->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('datapengumuman.destroy', $faq->id) }}" method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus pengumumaan ini?');">
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