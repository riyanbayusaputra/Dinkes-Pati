@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Kuesioner</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Kuesioner</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Kuesioner Anda</h2>

                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Kuesioner</h4>
                    </div>
                    <div class="card-body">
                        @if($questionnaires->count())
                            <ul class="list-group">
                                @foreach($questionnaires as $questionnaire)
                                    <li class="list-group-item">
                                        <a href="{{ route('questions.index', $questionnaire->id) }}">{{ $questionnaire->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Tidak ada kuesioner yang tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
