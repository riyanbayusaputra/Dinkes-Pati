@extends('FE.layouts.app')

@section('content')
<section id="content" class=" mt-4 mb-2">
    <div class="content-wrap py-0">
        <div class="container clearfix ">
            <!-- <div class="row">
                <div class="col-lg-4">

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
              
            </div>


            <br>
            <br>
            <br> -->


            <div class="row">
                <div class="col-lg-9">

                    <div class="row justify-content-center">
                        <div class="fancy-title title-bottom-border">
                            <h4 class="text-uppercase">hasil pengolahan air minum</h4>
                        </div>
                    </div>
                    <canvas id="chartline"></canvas>
                </div>
                <div class="col-lg-3">
                    <div class="row justify-content-center">
                        <div class="fancy-title title-bottom-border">
                            <h4 class="text-uppercase">INDEKS RISIKO SANITASI</h4>
                        </div>
                    </div>
                    <canvas id="riskChart"></canvas>
                </div>

            </div>
        </div>
    </div>
</section>

<section id="content" class=" mt-4 mb-2">
    <div class="content-wrap py-0">
        <div class="container clearfix">
            <div class="row justify-content-center">
                <div class="fancy-title title-bottom-border">
                    <h4 class="text-uppercase">Kondisi Sampah</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="kondisi-sampah">
                        <canvas id="kondisiSampahChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="content" class=" mt-4 mb-2">
    <div class="content-wrap py-0 mt-2 mb-2">
        <div class="container clearfix">
            <div class="row justify-content-center">
                <div class="fancy-title title-bottom-border">
                    <h4>AREA BERISIKO KABUPATEN PATI</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <canvas id="chartbatang"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection