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
                    <form action="{{ route('datapengumuman.update', $faq->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="question">Judul</label>
                            <input name="judul" class="form-control" value="{{ old('judul', $faq->judul) }}" required />
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                                id="image" name="image" accept="image/png, image/jpeg"
                                                onchange="loadFile(event)">
                                        </div>
                                        <div class="col">
                                            <img src="{{ route('pengumuman.image', ['path' => $faq->image])  }}" alt=""
                                                id="imagepreview" width="100px">
                                        </div>
                                    </div>
                                    @error('image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="pdf">PDF</label>
                                    <input type="file" class="form-control @error('pdf') is-invalid @enderror" id="pdf"
                                        name="pdf" accept="application/pdf">
                                    @error('pdf')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Tanggal Mulai</label> <!-- Tambahkan label untuk judul -->
                            <input type="date" name="mulai" class="form-control" value="{{ old('mulai', $faq->mulai) }}"
                                required> <!-- Input untuk judul -->
                        </div>
                        <div class="form-group">
                            <label for="title">Tanggal Selesai</label> <!-- Tambahkan label untuk judul -->
                            <input type="date" name="selesai" class="form-control"
                                value="{{ old('selesai', $faq->selesai) }}" required> <!-- Input untuk judul -->
                        </div>

                        <div class="form-group">
                            <label for="question">Keterangan</label>
                            <textarea name="keterangan" class="form-control" cols="30" rows="10"
                                required>{{ old('keterangan', $faq->keterangan) }}</textarea>
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
    var loadFile = function(event) {
        var output = document.getElementById('imagepreview');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
        }
    };
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