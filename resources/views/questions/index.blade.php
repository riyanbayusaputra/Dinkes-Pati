@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><i class="fas fa-clipboard-list mr-2"></i>Daftar Pertanyaan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i> Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('questionnaires.index') }}"><i class="fas fa-poll"></i> Kuesioner</a></div>
                    <div class="breadcrumb-item">{{ $questionnaire->title }}</div>
                    <div class="breadcrumb-item">Daftar Pertanyaan</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4><i class="fas fa-question-circle mr-2"></i>{{ $questionnaire->title }}</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('questions.create', $questionnaire->id) }}" class="btn btn-primary mr-2">
                                        <i class="fas fa-plus mr-1"></i> Tambah Pertanyaan
                                    </a>
                                    <a href="{{ route('questionnaires.show', $questionnaire->id) }}" class="btn btn-info">
                                        <i class="fas fa-edit mr-1"></i> Kerjakan
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-4">{{ $questionnaire->description ?: 'Tidak ada deskripsi' }}</p>
                                
                                @if($questionnaire->questions->count())
                                    <div class="list-group">
                                        @foreach($questionnaire->questions as $question)
                                            <div class="list-group-item list-group-item-action flex-column align-items-start mb-3 border rounded shadow-sm">
                                                <div class="d-flex w-100 justify-content-between align-items-center">
                                                    <h5 class="mb-1">
                                                        <span class="badge badge-primary mr-2">{{ $loop->iteration }}</span>
                                                        {{ $question->question_text }}
                                                    </h5>
                                                    <div>
                                                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-warning mr-2" data-toggle="tooltip" title="Edit Pertanyaan">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Pertanyaan" onclick="return confirm('Yakin ingin menghapus pertanyaan ini?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                @if($question->type === 'multiple_choice' || $question->type === 'checkbox')
                                                    <div class="mt-3">
                                                        <p class="mb-2 text-muted">
                                                            {{-- <i class="fas {{ $question->type === 'multiple_choice' ? 'fa-dot-circle' : 'fa-check-square' }} mr-2"></i>
                                                            {{ $question->type === 'multiple_choice' ? 'Pilihan Ganda' : 'Kotak Centang' }} --}}
                                                        </p>
                                                        <div class="row">
                                                            @foreach($question->options as $option)
                                                                <div class="col-md-6 mb-2">
                                                                    <div class="custom-control {{ $question->type === 'multiple_choice' ? 'custom-radio' : 'custom-checkbox' }}">
                                                                        <input type="{{ $question->type === 'multiple_choice' ? 'radio' : 'checkbox' }}" 
                                                                               id="option-{{ $option->id }}" 
                                                                               name="question-{{ $question->id }}" 
                                                                               class="custom-control-input" 
                                                                               disabled>
                                                                        <label class="custom-control-label" for="option-{{ $option->id }}">
                                                                            {{ $option->option_text }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-5">
                                        <img src="{{ asset('assets/img/empty.svg') }}" alt="No Questions" style="width: 200px">
                                        <h4 class="mt-4">Belum Ada Pertanyaan</h4>
                                        <p class="text-muted">Mulai tambahkan pertanyaan untuk kuesioner ini</p>
                                        <a href="{{ route('questions.create', $questionnaire->id) }}" class="btn btn-primary mt-3">
                                            <i class="fas fa-plus mr-1"></i> Tambah Pertanyaan Pertama
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

    @push('styles')
    <style>
        .list-group-item {
            transition: all 0.3s ease;
        }
        .list-group-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1) !important;
        }
        .custom-control-label {
            cursor: pointer;
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    @endpush
@endsection