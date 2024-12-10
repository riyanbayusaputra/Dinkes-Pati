@extends('FE.layouts.app')

@section('content')
<section id="content">
    <div class="content-wrap py-0">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-center">
                        <label class="mr-2"><input class="mr-2" type="radio" id="JaringanAirMinum" onclick="jaringanpdam()" name="e">Jaringan Air Minum</label>
                        <label class="mr-2"><input class="mr-2" type="radio" id="DaerahIrigasi" onclick="irigasi()" name="e">Daerah Irigasi</label>
                        <label class="mr-2"><input class="mr-2" type="radio" id="SaranaDanPrasarana" onclick="transportsarana()" name="e">Sarana Dan Prasarana</label>
                        <!-- <label><input type="radio" id="RumahTidakLayakHuni" onclick="taklayakhuni()" name="e">Rumah Tidak Layak Huni</label>
                        <label><input type="radio" id="KawasanKumuh" onclick="kawansankumuh()" name="e">Kawasan Kumuh</label> -->
                    </div>
                </div>
            </div>
            <div class="map-container">
                <div id="map" style="height: 40vw; margin-top: 10px"></div>
            </div>
        </div>
    </div>
</section>

@endsection