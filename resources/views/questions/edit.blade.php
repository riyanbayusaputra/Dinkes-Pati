@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Pertanyaan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Questions</a></div>
                    <div class="breadcrumb-item">Edit</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Form Edit Pertanyaan</h2>
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Pertanyaan - {{ $question->question_text }}</h5>
                    </div>
                    
                    <div class="card-body">
                        <form action="/questions/{{ $question->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group mb-3">
                                <label>Pertanyaan</label>
                                <input type="text" name="question_text" class="form-control" value="{{ old('question_text', $question->question_text) }}" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label>Tipe Pertanyaan</label>
                                <select name="type" class="form-control" id="questionType">
                                    <option value="multiple_choice" {{ $question->type === 'multiple_choice' ? 'selected' : '' }}>Pilihan Ganda</option>
                                    <option value="checkbox" {{ $question->type === 'checkbox' ? 'selected' : '' }}>Checkbox (Multiple)</option>
                                    <option value="text" {{ $question->type === 'text' ? 'selected' : '' }}>Text (Isian)</option>
                                </select>
                            </div>
                            
                            <div id="optionsContainer">
                                <label>Pilihan Jawaban</label>
                                <div class="option-inputs">
                                    @foreach ($question->options as $index => $option)
                                        <div class="input-group mb-2">
                                            <input type="text" name="options[]" class="form-control" value="{{ old('options.'.$index, $option->option_text) }}" placeholder="Pilihan {{ $index + 1 }}" required>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-danger remove-option">×</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-sm btn-info" id="addOption">
                                    + Tambah Pilihan
                                </button>
                            </div>
                            
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Simpan Pertanyaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const questionType = document.getElementById('questionType');
    const optionsContainer = document.getElementById('optionsContainer');
    const addOptionBtn = document.getElementById('addOption');

    // Toggle options container based on question type
    questionType.addEventListener('change', function() {
        optionsContainer.style.display = (this.value === 'text') ? 'none' : 'block';
    });

    // Add new option input
    addOptionBtn.addEventListener('click', function() {
        const optionCount = document.querySelectorAll('.option-inputs .input-group').length;
        const newOption = document.createElement('div');
        newOption.className = 'input-group mb-2';
        newOption.innerHTML = `
            <input type="text" name="options[]" class="form-control" placeholder="Pilihan ${optionCount + 1}" required>
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-option">×</button>
            </div>
        `;
        document.querySelector('.option-inputs').appendChild(newOption);
    });

    // Remove option input
    document.querySelector('.option-inputs').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-option')) {
            e.target.closest('.input-group').remove();
        }
    });

    // Set initial state for question type
    optionsContainer.style.display = (questionType.value === 'text') ? 'none' : 'block';
});
</script>
@endpush
@endsection
