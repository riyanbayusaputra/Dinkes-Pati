@extends('layouts.app')

@section('title', 'Import Data')

@push('style')
{{--
<link rel="stylesheet" href="{{asset('library/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('library/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('library/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Import Data</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                {{-- <div class="breadcrumb-item"><a href="#">Kegiatan</a></div>
                <div class="breadcrumb-item">Daftar</div> --}}
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Import Data</h2>

            <div class="card">
                <div class="card-header">
                    <div class="card-header-action">
                        {{-- <button class="btn btn-primary" id="modalimport">Import
                            Data</button> --}}
                        <form action="/import-data" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group mb-1">
                                <a href="/import/importdata.xlsx">
                                    <h4>Download template import data</h4>
                                </a>
                                <input type="file" name="filenya" id="filenya" class="form-control"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    style="height: 48px">
                            </div>
                            <button class="btn btn-primary btn-sm">Import</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="rtch-tab" data-toggle="tab" href="#rtch" role="tab"
                                aria-controls="rtch" aria-selected="false">rtch</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase active show" id="airminum-tab" data-toggle="tab"
                                href="#airminum" role="tab" aria-controls="airminum" aria-selected="true">air minum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="drainase-tab" data-toggle="tab" href="#drainase"
                                role="tab" aria-controls="drainase" aria-selected="false">drainase</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="kawasankumuh-tab" data-toggle="tab"
                                href="#kawasankumuh" role="tab" aria-controls="kawasankumuh"
                                aria-selected="false">kawasan kumuh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="sanitasi-tab" data-toggle="tab" href="#sanitasi"
                                role="tab" aria-controls="sanitasi" aria-selected="false">sanitasi</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="rtch" role="tabpanel" aria-labelledby="rtch-tab">

                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="rtchtable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Komponen</th>
                                            <th>Satuan</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($rtch as $k => $r)
                                        <tr>
                                            <td>{{$k+=1}}</td>
                                            <td>{{$r->komponen}}</td>
                                            <td>{{$r->satuan}}</td>
                                            <td>{{$r->tahun}}</td>
                                        </tr>
                                        @empty
                                        {{-- <tr>
                                            <td colspan="4" class="text-center">Tidak ada kegiatan yang ditemukan.</td>
                                        </tr> --}}
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="airminum" role="tabpanel"
                            aria-labelledby="airminum-tab">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="airminumtable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Komponen</th>
                                            <th>Satuan</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($air_minum as $k => $r)
                                        <tr>
                                            <td>{{$k+=1}}</td>
                                            <td>{{$r->komponen}}</td>
                                            <td>{{$r->satuan}}</td>
                                            <td>{{$r->tahun}}</td>
                                        </tr>
                                        @empty
                                        {{-- <tr>
                                            <td colspan="4" class="text-center">Tidak ada kegiatan yang ditemukan.</td>
                                        </tr> --}}
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="drainase" role="tabpanel" aria-labelledby="drainase-tab">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="drainasetable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Komponen</th>
                                            <th>Satuan</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($drainase as $k => $r)
                                        <tr>
                                            <td>{{$k+=1}}</td>
                                            <td>{{$r->komponen}}</td>
                                            <td>{{$r->satuan}}</td>
                                            <td>{{$r->tahun}}</td>
                                        </tr>
                                        @empty
                                        {{-- <tr>
                                            <td colspan="4" class="text-center">Tidak ada kegiatan yang ditemukan.</td>
                                        </tr> --}}
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kawasankumuh" role="tabpanel" aria-labelledby="kawasankumuh-tab">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="kawasankumuhtable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Komponen</th>
                                            <th>Satuan</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kawasan_kumuh as $k => $r)
                                        <tr>
                                            <td>{{$k+=1}}</td>
                                            <td>{{$r->komponen}}</td>
                                            <td>{{$r->satuan}}</td>
                                            <td>{{$r->tahun}}</td>
                                        </tr>
                                        @empty
                                        {{-- <tr>
                                            <td colspan="4" class="text-center">Tidak ada kegiatan yang ditemukan.</td>
                                        </tr> --}}
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sanitasi" role="tabpanel" aria-labelledby="sanitasi-tab">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="sanitasitable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Komponen</th>
                                            <th>Satuan</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sanitasi as $k => $r)
                                        <tr>
                                            <td>{{$k+=1}}</td>
                                            <td>{{$r->komponen}}</td>
                                            <td>{{$r->satuan}}</td>
                                            <td>{{$r->tahun}}</td>
                                        </tr>
                                        @empty
                                        {{-- <tr>
                                            <td colspan="4" class="text-center">Tidak ada kegiatan yang ditemukan.</td>
                                        </tr> --}}
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready( function () {
        $('#rtchtable').DataTable();
        $('#airminumtable').DataTable();
        $('#drainasetable').DataTable();
        $('#kawasankumuhtable').DataTable();
        $('#sanitasitable').DataTable();
    });
    $('#modalimport').on('click',function () {
        $('#modalimportnya').modal('show');
        let el = document.getElementsByClassName('modal-backdrop');
        el.classList.remove('show');
        console.log(el);
        
    });
</script>
{{-- <script src="{{asset('js/page/bootstrap-modal.js')}}"></script> --}}
{{-- <script src="{{asset('library/datatables/datatables.min.js')}}"></script>
<script src="{{asset('library/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('library/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script> --}}
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
@endpush