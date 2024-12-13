@extends('FE.layouts.app')

@section('content')
<section id="content">
    <div class="content-wrap py-0">
        <div class="container clearfix mt-4">
            <div class="heading-block center">
                <h2>Pengumuman</h2>
                <span>Daftar pengumunan</span>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th colspan="2" class="text-center">Tanggal</th>
                            <th>Pengumuman</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengumuman as $key => $p)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{\Carbon\Carbon::parse($p->mulai)->format('d-m-Y')}}</td>
                            <td>{{\Carbon\Carbon::parse($p->selesai)->format('d-m-Y')}}</td>
                            <td>{{$p->keterangan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection