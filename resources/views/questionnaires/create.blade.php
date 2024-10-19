{{-- resources/views/questionnaires/create.blade.php --}}
@extends('layouts.app')


@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kuesioner Baru</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Users</a></div>
                    <div class="breadcrumb-item">Tambah</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Form Kuesioner Baru</h2>
                <div class="card">
                    <div class="card-header">Buat Kuesioner Baru</div>
                    
                    <div class="card-body">
                        <form method="POST" action="/questionnaires">
                            @csrf
                            
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Buat Kuesioner</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
