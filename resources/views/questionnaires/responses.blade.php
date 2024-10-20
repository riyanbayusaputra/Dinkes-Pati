@extends('layouts.app')

@section('main')
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <!-- Tombol Previous -->
                        @if($prevQuestionnaire)
                            <a href="/questionnaires/{{ $prevQuestionnaire->id }}/responses" class="btn btn-sm btn-outline-primary me-2">
                                <i class="fas fa-chevron-left"></i> Prev
                            </a>
                        @endif

                        <h4 class="text-primary mb-0">{{ $questionnaire->title }}</h4>

                        <!-- Tombol Next -->
                        @if($nextQuestionnaire)
                            <a href="/questionnaires/{{ $nextQuestionnaire->id }}/responses" class="btn btn-sm btn-outline-primary ms-2">
                                Next <i class="fas fa-chevron-right"></i>
                            </a>
                        @endif
                    </div>
                    <span class="badge badge-secondary">{{ $questionnaire->responses->count() }} Responden</span>
                </div>

                <div class="card-body">
                    <button class="btn btn-primary btn-sm" id="btnexport">Export Excel</button>
                    <div class="mb-4">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari responden..." name="search"
                                    value="{{ request('search') }}" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" style="width: 40px;">No</th>
                                    <th>Email Responden</th>
                                    <th>Tanggal Pengisian</th>
                                    <th class="text-center" style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($responses as $key => $response)
                                <tr>
                                    <td class="text-center">{{ ($responses->currentpage()-1) * $responses->perpage() + $key + 1 }}</td>
                                    <td>{!! $response->respondent_email ?? '<span class="text-secondary">Anonymous</span>' !!}</td>
                                    <td>{{ $response->created_at->format('d M Y H:i') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('responses.show', $response->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <div class="empty-state">
                                            <div class="empty-state-icon bg-light">
                                                <i class="fas fa-question"></i>
                                            </div>
                                            <h2 class="mt-3">Belum Ada Responden</h2>
                                            <p class="lead">Belum ada yang mengisi kuesioner ini.</p>
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
                
                <!-- Tabel tersembunyi untuk eksport -->
                <div class="d-none">
                    <table id="table1">
                        <tbody>
                            @foreach($responses as $key => $r)
                            <tr>
                                <th colspan="3">{{$r->respondent_email}}</th>
                            </tr>
                            @if(count($r->answers) > 0)
                            <tr>
                                <td></td>
                                <td>Pertanyaan</td>
                                <td>Jawaban</td>
                            </tr>
                            @foreach($r->answers as $k => $a)
                            <tr>
                                <td></td>
                                <td>{{$a->question->question_text}}</td>
                                <td>{{$a->answer}}</td>
                            </tr>
                            @endforeach
                            @endif
                            <tr></tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk export tabel -->
<script>
    $('#btnexport').on('click', function () {
        TableToExcel.convert(document.getElementById("table1"));
    });
</script>
@endsection