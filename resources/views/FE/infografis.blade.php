@extends('FE.layouts.app')

@section('content')
<section id="content">
    <div class="content-wrap py-0">
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Content risiko sanitasi -->
                    <div class="sanitation-risk m-0">
                        <div class="title-containerc">
                            <h2 class="title text-center">INDEKS RISIKO SANITASI</h2>
                        </div>
                        <div class="chart-container">
                            <ul class="legend">
                                <li><span class="color-box" style="background-color: #F89B45;"></span> Sumber Air</li>
                                <li><span class="color-box" style="background-color: #998CEB;"></span> Air Limbah
                                    Domestik</li>
                                <li><span class="color-box" style="background-color: #F48989;"></span> Persampahan</li>
                                <li><span class="color-box" style="background-color: #4BC0C0;"></span> Genangan Air</li>
                                <li><span class="color-box" style="background-color: #5A87EB;"></span> Perilaku STBM
                                    Pilar</li>
                            </ul>
                            <canvas id="riskChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- Content kondisi sampah -->
                    <div class="title-containerc">
                        <h2 class="text-center">KONDISI SAMPAH</h2>
                    </div>
                    <div class="kondisi-sampah">
                        <canvas id="kondisiSampahChart"></canvas>
                    </div>
                </div>
            </div>


            <br>
            <br>
            <br>


            <div class="row">
                <div class="col-lg-6">
                    <div class="hasil-pengolahan">
                        <div class="title-containerc">
                            <h2 class="text-center">HASIL PENGOLAHAN AIR MINUM</h2>
                        </div>
                        <div class="container" style="height: 300px;">
                            <canvas id="chartline"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hasil-pengolahan">
                        <div class="title-containerc">
                            <h2 class="text-center">AREA BERISIKO KABUPATEN PATI</h2>
                        </div>
                        <div class="container" style="height: 300px;">
                            <canvas id="chartbatang"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection