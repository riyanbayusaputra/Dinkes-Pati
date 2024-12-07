@extends('FE.layouts.app')

@section('content')
<section id="content" class=" mt-4 mb-2">
    <div class="content-wrap py-0">
        <div class="container clearfix ">
            <div class="row mb-2">
                <div class="col-lg-6">

                    <div class="row justify-content-center">
                        <div class="fancy-title title-bottom-border">
                            <h4 class="text-uppercase">hasil pengolahan air minum</h4>
                        </div>
                    </div>
                    <canvas id="chartline"></canvas>
                </div>
                <div class="col-lg-6">
                    <div class="row justify-content-center">
                        <div class="fancy-title title-bottom-border">
                            <h4 class="text-uppercase" style="color: rgba(0,0,0,0);">INDEKS RISIKO SANITASI</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="charttable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr style="font-size: 12px !important;">
                                    <th>Tahun</th>
                                    <th>Kecamatan</th>
                                    <th>Area Sebaran</th>
                                    <th>Luas Sebaran</th>
                                    <th>Tingkat Risiko</th>
                                    <th>Kondisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Bleber</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Gerit</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Gesengan</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Karangsari</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="divider divider-center"><i class="icon-cloud"></i></div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    <div class="row justify-content-center">
                        <div class="fancy-title title-bottom-border">
                            <h4 class="text-uppercase">INDEKS RISIKO SANITASI</h4>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="charttable2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr style="font-size: 12px !important;">
                                    <th>Tahun</th>
                                    <th>Kecamatan</th>
                                    <th>Area Sebaran</th>
                                    <th>Luas Sebaran</th>
                                    <th>Tingkat Risiko</th>
                                    <th>Kondisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Bleber</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Gerit</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Gesengan</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Karangsari</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row justify-content-center">
                        <div class="fancy-title title-bottom-border">
                            <h4 class="text-uppercase" style="color: rgba(0,0,0,0);">INDEKS RISIKO SANITASI</h4>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="riskChart"></canvas>
                    </div>
                </div>

            </div>
            <div class="divider divider-center"><i class="icon-cloud"></i></div>
            <div class="row mb-2">
                <div class="col-lg-6">

                    <div class="row justify-content-center">
                        <div class="fancy-title title-bottom-border">
                            <h4 class="text-uppercase">Kondisi Sampah</h4>
                        </div>
                    </div>
                    <canvas id="kondisiSampahChart"></canvas>
                </div>
                <div class="col-lg-6">
                    <div class="row justify-content-center">
                        <div class="fancy-title title-bottom-border">
                            <h4 class="text-uppercase" style="color: rgba(0,0,0,0);">INDEKS RISIKO SANITASI</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="charttable3" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr style="font-size: 12px !important;">
                                    <th>Tahun</th>
                                    <th>Kecamatan</th>
                                    <th>Area Sebaran</th>
                                    <th>Luas Sebaran</th>
                                    <th>Tingkat Risiko</th>
                                    <th>Kondisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Bleber</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Gerit</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Gesengan</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Karangsari</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="divider divider-center"><i class="icon-cloud"></i></div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    <div class="row justify-content-center">
                        <div class="fancy-title title-bottom-border">
                            <h4>AREA BERISIKO KABUPATEN PATI</h4>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="charttable4" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr style="font-size: 12px !important;">
                                    <th>Tahun</th>
                                    <th>Kecamatan</th>
                                    <th>Area Sebaran</th>
                                    <th>Luas Sebaran</th>
                                    <th>Tingkat Risiko</th>
                                    <th>Kondisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Bleber</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Gerit</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Gesengan</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>Cluwak</td>
                                    <td>Karangsari</td>
                                    <td>235642</td>
                                    <td>Sedang</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row justify-content-center">
                        <div class="fancy-title title-bottom-border">
                            <h4 class="text-uppercase" style="color: rgba(0,0,0,0);">INDEKS RISIKO SANITASI</h4>
                        </div>
                    </div>
                    <canvas id="chartbatang"></canvas>
                    <!-- <div class="chart-container">
                    </div> -->
                </div>

            </div>
        </div>
</section>


@endsection