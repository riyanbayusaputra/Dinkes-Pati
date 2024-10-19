@extends('layouts.app')

@section('title', 'Tambah FAQ Baru')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah FAQ Baru</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">FAQ</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Form Tambah FAQ</h2>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('faqs.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="title">Judul</label> <!-- Tambahkan label untuk judul -->
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required> <!-- Input untuk judul -->
                            </div>

                            <div class="form-group">
                                <label for="question">Pertanyaan</label>
                                <input type="text" name="question" class="form-control" value="{{ old('question') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="answers">Jawaban</label>
                                <div id="answers-container">
                                    <div class="answer-item mb-2">
                                        <textarea name="answers[]" class="form-control" rows="2" required></textarea>
                                        <button type="button" class="btn btn-danger btn-sm remove-answer mt-2">Hapus Jawaban</button>
                                    </div>
                                </div>
                                <button type="button" id="add-answer" class="btn btn-sm btn-success mt-2">Tambah Jawaban</button>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Simpan FAQ</button>
                                <a href="{{ route('faqs.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.getElementById('add-answer').addEventListener('click', function() {
            var container = document.getElementById('answers-container');
            var newAnswerItem = document.createElement('div');
            newAnswerItem.classList.add('answer-item', 'mb-2');

            var newAnswer = document.createElement('textarea');
            newAnswer.name = 'answers[]';
            newAnswer.classList.add('form-control', 'mt-2');
            newAnswer.rows = 2;
            newAnswer.required = true;

            var removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'remove-answer', 'mt-2');
            removeButton.textContent = 'Hapus Jawaban';

            // Tambahkan event listener untuk menghapus jawaban
            removeButton.addEventListener('click', function() {
                container.removeChild(newAnswerItem);
            });

            newAnswerItem.appendChild(newAnswer);
            newAnswerItem.appendChild(removeButton);
            container.appendChild(newAnswerItem);
        });
    </script>
@endsection
