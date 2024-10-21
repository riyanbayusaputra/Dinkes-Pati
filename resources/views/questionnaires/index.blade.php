@extends('layouts.app')
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Kuesioner</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i> Dashboard</a></div>
                    <div class="breadcrumb-item">Kuesioner</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Kuesioner Anda</h2>
                <p class="section-lead">Kelola semua kuesioner Anda di sini</p>

                <!-- Flash Message -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4><i class="fas fa-clipboard-list mr-2"></i>Daftar Kuesioner</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('questionnaires.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Tambah Kuesioner
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                @if($questionnaires->count())
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th>Judul Kuesioner</th>
                                                    <th>Tanggal Dibuat</th>
                                                    <th width="20%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($questionnaires as $key => $questionnaire)
                                                    <tr>
                                                        <td class="text-center">{{ $key + 1 }}</td>
                                                        <td>{{ $questionnaire->title }}</td>
                                                        <td>{{ $questionnaire->created_at->format('d F Y') }}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route('questions.index', $questionnaire->id) }}" 
                                                               class="btn btn-sm btn-primary" 
                                                               data-toggle="tooltip" 
                                                               title="Lihat Pertanyaan">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('questionnaires.edit', $questionnaire->id) }}" 
                                                               class="btn btn-sm btn-info mx-1" 
                                                               data-toggle="tooltip" 
                                                               title="Edit Kuesioner">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('questionnaires.destroy', $questionnaire->id) }}" 
                                                                  method="POST" 
                                                                  class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" 
                                                                        class="btn btn-sm btn-danger" 
                                                                        data-toggle="tooltip" 
                                                                        title="Hapus Kuesioner"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kuesioner ini?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="text-center py-5">
                                        <img src="{{ asset('assets/img/empty.svg') }}" alt="Empty Data" style="width: 200px">
                                        <h4 class="mt-4">Belum Ada Kuesioner</h4>
                                        <p class="text-muted">Silakan tambahkan kuesioner baru untuk memulai</p>
                                        <a href="{{ route('questionnaires.create') }}" class="btn btn-primary mt-3">
                                            <i class="fas fa-plus"></i> Tambah Kuesioner
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
    <script>
        // Inisialisasi tooltip
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        // Auto hide alert
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 3000);
    </script>
    @endpush
@endsection