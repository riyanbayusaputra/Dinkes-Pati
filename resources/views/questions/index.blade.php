@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Pertanyaan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('questionnaires.index') }}">Kuesioner</a></div>
                    <div class="breadcrumb-item">{{ $questionnaire->title }}</div>
                    <div class="breadcrumb-item">Daftar Pertanyaan</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Pertanyaan dalam Kuesioner "{{ $questionnaire->title }}"</h2>
                <p>{{ $questionnaire->description }}</p>

                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Pertanyaan</h4>
                        <div class="card-header-action">
                            <a href="{{ route('questions.create', $questionnaire->id) }}" class="btn btn-primary">Tambah Pertanyaan</a>
                            <a href="{{ route('questionnaires.show', $questionnaire->id) }}" class="btn btn-sm btn-info">kerjakan</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($questionnaire->questions->count())
                            <ul class="list-group">
                                @foreach($questionnaire->questions as $question)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <span>{{ $loop->iteration }}. {{ $question->question_text }}</span>
                                            <div>
                                                <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('questions.destroy', $question->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pertanyaan ini?')">Hapus</button>
                                                </form>
                                                <!-- Tombol Show -->
                                                
                                            </div>
                                        </div>
                                        <!-- Tampilkan opsi jika tipe pertanyaan multiple_choice atau checkbox -->
                                        @if($question->type === 'multiple_choice' || $question->type === 'checkbox')
                                            <ul>
                                                @foreach($question->options as $option)
                                                    <li>{{ $option->option_text }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Tidak ada pertanyaan dalam kuesioner ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
