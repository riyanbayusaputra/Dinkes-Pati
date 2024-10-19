@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Responden Kuesioner</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('questionnaires.index') }}">Kuesioner</a></div>
                    <div class="breadcrumb-item">{{ $questionnaire->title }}</div>
                    <div class="breadcrumb-item">Responden</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Responden untuk Kuesioner "{{ $questionnaire->title }}"</h2>

                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Responden</h4>
                    </div>
                    <div class="card-body">
                        @if($questionnaire->responses->count())
                            <ul class="list-group">
                                @foreach($questionnaire->responses as $response)
                                    <li class="list-group-item">
                                        Responden ID: {{ $response->id }} - Tanggal: {{ $response->created_at }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Tidak ada responden untuk kuesioner ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
