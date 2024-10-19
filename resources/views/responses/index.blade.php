@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Semua Respons dari Semua Kuesioner</h2>

    @if($responses->isEmpty())
        <p>Tidak ada respons.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Pengguna</th>
                    <th>Kuesioner</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($responses as $response)
                    <tr>
                        <td>{{ $response->user->name }}</td>
                        <td>{{ $response->questionnaire->title }}</td> <!-- Menampilkan judul kuesioner -->
                        <td>{{ $response->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('responses.show', ['response' => $response->id]) }}" class="btn btn-info">Lihat Jawaban</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
