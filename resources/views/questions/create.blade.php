{{-- resources/views/questions/create.blade.php --}}
@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Pengguna Baru</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Users</a></div>
                    <div class="breadcrumb-item">Tambah</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Form Tambah Pengguna</h2>
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Pertanyaan - {{ $questionnaire->title }}</h5>
                    </div>
                    
                    <div class="card-body">
                        <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="POST">
                            @csrf
                            
                            
                            <div class="form-group mb-3">
                                <label>Pertanyaan</label>
                                <input type="text" name="question_text" class="form-control" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label>Tipe Pertanyaan</label>
                                <select name="type" class="form-control" id="questionType">
                                    <option value="multiple_choice">Pilihan Ganda</option>
                                    <option value="checkbox">Checkbox (Multiple)</option>
                                    <option value="text">Text (Isian)</option>
                                </select>
                            </div>
                            
                            <div id="optionsContainer">
                                <label>Pilihan Jawaban</label>
                                <div class="option-inputs">
                                    <div class="input-group mb-2">
                                        <input type="text" name="options[]" class="form-control" placeholder="Pilihan 1">
                                        <button type="button" class="btn btn-danger remove-option">×</button>
                                    </div>
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
        optionsContainer.style.display = 
            (this.value === 'text') ? 'none' : 'block';
    });
    
    // Add new option input
    addOptionBtn.addEventListener('click', function() {
        const optionCount = document.querySelectorAll('.option-inputs .input-group').length;
        const newOption = document.createElement('div');
        newOption.className = 'input-group mb-2';
        newOption.innerHTML = `
            <input type="text" name="options[]" class="form-control" placeholder="Pilihan ${optionCount + 1}">
            <button type="button" class="btn btn-danger remove-option">×</button>
        `;
        document.querySelector('.option-inputs').appendChild(newOption);
    });
    
    // Remove option input
    document.querySelector('.option-inputs').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-option')) {
            e.target.parentElement.remove();
        }
    });
});
</script>
@endpush
@endsection