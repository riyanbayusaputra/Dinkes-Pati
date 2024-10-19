@extends('layouts.app')

@section('title', 'Edit FAQ')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit FAQ</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">FAQ</a></div>
                    <div class="breadcrumb-item">Edit</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Form Edit FAQ</h2>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Judul</label> <!-- Field untuk judul -->
                                <input type="text" name="title" class="form-control" value="{{ old('title', $faq->title) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="question">Pertanyaan</label>
                                <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="answers">Jawaban</label>
                                <div id="answers-container">
                                    @foreach ($faq->answers as $answer)
                                        <textarea name="answers[]" class="form-control mt-2" rows="2" required>{{ $answer->answer }}</textarea>
                                    @endforeach
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
            var newAnswer = document.createElement('textarea');
            newAnswer.name = 'answers[]';
            newAnswer.classList.add('form-control', 'mt-2');
            newAnswer.rows = 2;
            newAnswer.required = true;
            container.appendChild(newAnswer);
        });
    </script>
@endsection
