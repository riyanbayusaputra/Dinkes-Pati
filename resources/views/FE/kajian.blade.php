@extends('FE.layouts.app')

@section('content')
<section id="content">
    <div class="content-wrap py-0">
        <div class="section m-0 border-top-0 bg-transparent" style="padding: 80px 0 60px;">
            <div class="container center clearfix">

                <div class="heading-block">
                    <h2>Kajian Dinas Kesehatan Kabupaten Pati</h2>
                    <span>Sistem Informasi Rumpun Bidang Infrastruktur dan Kewilayahan Pati</span>
                </div>

                <!-- <div class="select-data">
                    <form method="GET" action="{{ route('kajian') }}">
                        <input type="text" name="search" placeholder="Cari data disini" class="form-control" value="{{ request('search') }}">
                        <button type="submit">Cari</button>
                    </form>
                </div> -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">

                            <table id="myTable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="numbering">NO</th>
                                        <th>Tahun</th>
                                        <th>Judul</th>
                                        <th>Penyusun</th>
                                        <th>Deskripsi</th>
                                        <th>Lihat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $document)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $document->tahun }}</td>
                                        <td>{{ $document->title }}</td>
                                        <td>{{ $document->penyusun }}</td>
                                        <td class="row-data">{{ $document->description }}</td>
                                        <td>
                                            <a href="{{ route('documents.showFile', ['id' => $document->id]) }}" target="_blank" class="download-icon"><i
                                                    class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection