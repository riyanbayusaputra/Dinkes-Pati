@extends('layouts.app')

@section('title', 'Detail Dokumen')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Dokumen</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('documents.index') }}">Dokumen</a></div>
                    <div class="breadcrumb-item">Detail</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{ $document->title }}</h2>

                <div class="card">
                    <div class="card-body">
                        <h5>Deskripsi:</h5>
                        <p>{{ $document->description }}</p>

                        <h5>File:</h5>
                        <a href="{{ asset('storage/' . $document->file) }}" target="_blank" class="btn btn-primary">
                            Download File
                        </a>
                    </div>
                </div>

                <div class="text-right mt-4">
                    <a href="{{ route('documents.index') }}" class="btn btn-secondary">Kembali ke Daftar Dokumen</a>
                </div>
            </div>
        </section>
    </div>
@endsection
