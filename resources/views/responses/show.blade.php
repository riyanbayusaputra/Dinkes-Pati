@extends('layouts.app')

@section('main')
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Detail Jawaban Responden</h4>
                </div>

                <div class="card-body">
                    <h5>Email Responden: {{ $response->respondent_email ?? 'Anonymous' }}</h5>
                    <p>Tanggal Pengisian: {{ $response->created_at->format('d M Y H:i') }}</p>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($response->answers as $index => $answer)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $answer->question->question_text }}</td>
                                        <td>{{ $answer->answer }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
