@extends('layouts.app')

@section('main')
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="text-primary">{{ $questionnaire->title }}</h4>
                    <span class="badge badge-secondary">{{ $responses->total() }} Responden</span>
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
            </div>
        </div>
    </div>
</div>
@endsection
