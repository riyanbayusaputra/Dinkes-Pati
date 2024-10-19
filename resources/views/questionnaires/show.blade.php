@extends('layouts.app')
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $questionnaire->title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('questionnaires.index') }}">Questionnaires</a></div>
                    <div class="breadcrumb-item">{{ $questionnaire->title }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Detail Kuesioner</h2>
                <p>{{ $questionnaire->description }}</p>
                <div class="card">
                    <div class="card-header">
                        <h4>Pertanyaan dan Opsi Jawaban</h4>
                    </div>
                    <div class="card-body">
                        @if($questionnaire->questions->count())
                            <form action="{{ route('responses.store', $questionnaire->id) }}" method="POST">
                                @csrf
                                
                                <!-- Optional: Field untuk email responden -->
                                <div class="form-group">
                                    <label>Email Responden (Opsional)</label>
                                    <input type="email" name="respondent_email" class="form-control" value="{{ old('respondent_email') }}">
                                </div>

                                @foreach($questionnaire->questions as $question)
                                    <div class="form-group">
                                        <label>{{ $loop->iteration }}. {{ $question->question_text }}</label>
                                        @foreach($question->options as $option)
                                            <div class="form-check">
                                                <!-- Perubahan name field dari responses menjadi answers -->
                                                <input class="form-check-input" 
                                                       type="radio" 
                                                       name="answers[{{ $question->id }}]" 
                                                       value="{{ $option->option_text }}" 
                                                       id="option{{ $option->id }}"
                                                       {{ old("answers.{$question->id}") == $option->option_text ? 'checked' : '' }}>
                                                <label class="form-check-label" for="option{{ $option->id }}">
                                                    {{ $option->option_text }}
                                                </label>
                                            </div>
                                        @endforeach
                                        
                                        @error("answers.{$question->id}")
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary mt-4">Submit Responses</button>
                            </form>
                        @else
                            <p>Tidak ada pertanyaan untuk kuesioner ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection