{{-- resources/views/questionnaires/fill.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $questionnaire->title }}</h4>
                    <p class="text-muted mb-0">{{ $questionnaire->description }}</p>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('responses.store', $questionnaire->id) }}" method="POST">
                        @csrf
                        
                        <div class="form-group mb-4">
                            <label>Email (Opsional)</label>
                            <input type="email" name="respondent_email" class="form-control">
                        </div>
                        
                        @foreach($questionnaire->questions as $key => $question)
                        <div class="question-container mb-4">
                            <p class="fw-bold mb-2">{{ $key + 1 }}. {{ $question->question_text }}</p>
                            
                            @switch($question->type)
                                @case('multiple_choice')
                                    @foreach($question->options as $option)
                                    <div class="form-check">
                                        <input type="radio" 
                                               name="answers[{{ $question->id }}]" 
                                               value="{{ $option->option_text }}"
                                               class="form-check-input"
                                               required>
                                        <label class="form-check-label">{{ $option->option_text }}</label>
                                    </div>
                                    @endforeach
                                    @break
                                    
                                @case('checkbox')
                                    @foreach($question->options as $option)
                                    <div class="form-check">
                                        <input type="checkbox" 
                                               name="answers[{{ $question->id }}][]" 
                                               value="{{ $option->option_text }}"
                                               class="form-check-input">
                                        <label class="form-check-label">{{ $option->option_text }}</label>
                                    </div>
                                    @endforeach
                                    @break
                                    
                                @case('text')
                                    <textarea name="answers[{{ $question->id }}]" 
                                              class="form-control" 
                                              rows="3"
                                              required></textarea>
                                    @break
                            @endswitch
                        </div>
                        @endforeach
                        
                        <button type="submit" class="btn btn-primary">Submit Jawaban</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection