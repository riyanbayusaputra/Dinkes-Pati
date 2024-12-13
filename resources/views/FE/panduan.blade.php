@extends('FE.layouts.app')

@section('content')
<section id="content">
    <div class="content-wrap py-0">
        <div class="container clearfix mt-4">
            <div class="heading-block center">
                <h2>Panduan</h2>
                <span>Download file panduan untuk dipelajari secara offline</span>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Panduan</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Penggunaan EHRA</td>
                            <td><a href="/filepanduan/panduan.pdf"><button
                                        class="btn btn-primary btn-sm">Download</button></a></td>
                        </tr>
                        {{-- @foreach($pengumuman as $key => $p)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{\Carbon\Carbon::parse($p->mulai)->format('d-m-Y')}}</td>
                            <td>{{\Carbon\Carbon::parse($p->selesai)->format('d-m-Y')}}</td>
                            <td>{{$p->keterangan}}</td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection