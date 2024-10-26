@extends('layouts.app')

@section('title', 'Daftar Kritik dan Saran')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Kritik dan Saran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Kritik dan saran</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Kritik dan Saran</h2>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            {{-- <div class="mb-4 text-right">
                <a href="{{ route('faqs.create') }}" class="btn btn-primary">Tambah FAQ Baru</a>
            </div> --}}

            <div class="card">
                <div class="card-header">
                    <h4>Daftar Kritik dan Saran</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{ $faq->nama }}</td> <!-- Menampilkan judul FAQ -->
                                    <td>{{ $faq->email }}</td>
                                    <td>{{ $faq->pesan }}</td>
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