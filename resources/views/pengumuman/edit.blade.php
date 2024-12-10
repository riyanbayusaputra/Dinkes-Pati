@extends('layouts.app')

@section('title', 'Edit FAQ')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Pengumuman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Pengumuman</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit Pengumuman</h2>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('datapengumuman.update', $faq->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Tanggal Mulai</label> <!-- Tambahkan label untuk judul -->
                            <input type="date" name="mulai" class="form-control" value="{{ old('mulai', $faq->mulai) }}" required> <!-- Input untuk judul -->
                        </div>
                        <div class="form-group">
                            <label for="title">Tanggal Selesai</label> <!-- Tambahkan label untuk judul -->
                            <input type="date" name="selesai" class="form-control" value="{{ old('selesai', $faq->selesai) }}" required> <!-- Input untuk judul -->
                        </div>

                        <div class="form-group">
                            <label for="question">Keterangan</label>
                            <textarea name="keterangan" class="form-control" cols="30" rows="10" required>{{ old('keterangan', $faq->keterangan) }}</textarea>
                        </div>




                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Simpan Pengumuman</button>
                            <a href="{{ route('datapengumuman.index') }}" class="btn btn-secondary">Batal</a>
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