@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Terima Kasih</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('questionnaires.index') }}">Questionnaires</a></div>
                    <div class="breadcrumb-item">Thank You</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon bg-success">
                                <i class="fas fa-check"></i>
                            </div>
                            <h2>Respon Berhasil Disimpan</h2>
                            <p class="lead">
                                Terima kasih telah mengisi kuesioner "{{ $questionnaire->title }}"
                            </p>
                            <a href="{{ route('questionnaires.index') }}" class="btn btn-primary mt-4">
                                Kembali ke Daftar Kuesioner
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection