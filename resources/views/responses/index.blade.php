@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Pengisi Kuesioner: {{ $questionnaire->title }}</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h5>Daftar Responden</h5>
                    </div>
                    
                    <div class="card-body">
                        @if($responses->isEmpty())
                            <p>Tidak ada responden yang telah mengisi kuesioner ini.</p>
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Pengisi</th>
                                        <th>Tanggal Pengisian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($responses as $response)
                                        <tr>
                                            <td>{{ $response->user->name }}</td>
                                            <td>{{ $response->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('responses.show', ['questionnaire' => $questionnaire->id, 'response' => $response->id]) }}" class="btn btn-info">Lihat Jawaban</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
