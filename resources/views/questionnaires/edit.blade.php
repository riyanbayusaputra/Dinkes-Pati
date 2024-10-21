<!-- resources/views/questionnaires/edit.blade.php -->
@extends('layouts.app')
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Kuesioner</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('questionnaires.index') }}">Kuesioner</a></div>
                    <div class="breadcrumb-item">Edit</div>
                </div>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Kuesioner</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('questionnaires.update', $questionnaire->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Judul Kuesioner</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                       value="{{ old('title', $questionnaire->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                                          rows="4">{{ old('description', $questionnaire->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Kuesioner</button>
                                <a href="{{ route('questionnaires.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection