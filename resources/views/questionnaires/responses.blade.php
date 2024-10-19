@extends('layouts.app')

@section('main')
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ $questionnaire->title }}</h4>
                    <span class="badge badge-light">{{ $responses->total() }} Responden</span>
                </div>

                <div class="card-body">
                    <div class="mb-4">
                        <form>
                            <div class="input-group">
                                <input type="text" 
                                       class="form-control" 
                                       placeholder="Cari responden..."
                                       name="search"
                                       value="{{ request('search') }}"
                                       aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center" style="width: 40px;">No</th>
                                    <th>Email Responden</th>
                                    <th>Tanggal Pengisian</th>
                                    <th class="text-center" style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($responses as $key => $response)
                                    <tr>
                                        <td class="text-center">
                                            {{ ($responses->currentpage()-1) * $responses->perpage() + $key + 1 }}
                                        </td>
                                        <td>
                                            @if($response->respondent_email)
                                                {{ $response->respondent_email }}
                                            @else
                                                <span class="text-secondary">Anonymous</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $response->created_at->format('d M Y H:i') }}
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-info btn-sm" 
                                                    data-toggle="modal" 
                                                    data-target="#responseDetail{{ $response->id }}">
                                                <i class="fas fa-eye"></i> Detail
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Detail Responden -->
                                    <div class="modal fade" 
                                         id="responseDetail{{ $response->id }}" 
                                         tabindex="-1" 
                                         role="dialog"
                                         aria-labelledby="responseDetailLabel{{ $response->id }}"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info text-white">
                                                    <h5 class="modal-title" id="responseDetailLabel{{ $response->id }}">
                                                        <i class="fas fa-clipboard-list mr-2"></i>
                                                        Detail Jawaban Responden
                                                    </h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th style="width: 50px">No</th>
                                                                    <th>Pertanyaan</th>
                                                                    <th>Jawaban</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($response->answers as $index => $answer)
                                                                    <tr>
                                                                        <td class="text-center">{{ $index + 1 }}</td>
                                                                        <td>{{ $answer->question->question_text }}</td>
                                                                        <td>{{ $answer->answer }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-dismiss="modal">
                                                        <i class="fas fa-times mr-1"></i> Tutup
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5">
                                            <div class="empty-state">
                                                <div class="empty-state-icon bg-light">
                                                    <i class="fas fa-question"></i>
                                                </div>
                                                <h2 class="mt-3">Belum Ada Responden</h2>
                                                <p class="lead">
                                                    Belum ada yang mengisi kuesioner ini.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($responses->hasPages())
                        <div class="card-footer text-center">
                            {{ $responses->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
