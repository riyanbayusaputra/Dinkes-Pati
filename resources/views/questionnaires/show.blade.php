@extends('layouts.app')
@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $questionnaire->title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('questionnaires.index') }}">Questionnaires</a></div>
                <div class="breadcrumb-item">{{ $questionnaire->title }}</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Detail Kuesioner</h2>
            <p>{{ $questionnaire->description }}</p>
            <div class="card">
                <div class="card-header">
                    <h4>Pertanyaan dan Opsi Jawaban</h4>
                </div>
                <div class="card-body">
                    @if($questionnaire->questions->count())
                    <form action="{{ route('responses.store', $questionnaire->id) }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body p-0">
                                <!-- Optional: Field untuk email responden -->
                                <div class="form-group">
                                    <label>Email Responden (Opsionals)</label>
                                    <input type="email" name="respondent_email" class="form-control"
                                        value="{{ old('respondent_email') }}">
                                </div>
                                <div id="accordion">
                                    <div class="accordion">
                                        <div class="accordion-header d-flex text-uppercase" role="button"
                                            data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                                            <h4 class="mr-auto">Data Wilayah</h4>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24"
                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                <path
                                                    d="M11.178 19.569a.998.998 0 0 0 1.644 0l9-13A.999.999 0 0 0 21 5H3a1.002 1.002 0 0 0-.822 1.569l9 13z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="accordion-body collapse show" id="panel-body-1"
                                            data-parent="#accordion">
                                            <div class="row">
                                                <div class="form-group col-lg-2">
                                                    <label for="propinsi" class="text-capitalize">Propinsi</label>
                                                    <input type="text" name="propinsi" id="propinsi"
                                                        class="form-control" value="Jawa Tengah" readonly>
                                                </div>
                                                <div class="form-group col-lg-2">
                                                    <label for="kabupaten" class="text-capitalize">kabupaten /
                                                        kota</label>
                                                    <input type="text" name="kabupaten" id="kabupaten"
                                                        class="form-control" value="Pati" readonly>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="kecamatan" class="text-capitalize">kecamatan</label>
                                                    <select name="kecamatan" id="kecamatan" class="form-control"
                                                        onchange="changekecamatan()">
                                                        <option value="">Pilih</option>
                                                        <option value="33.18.07">Batangan</option>
                                                        <option value="33.18.18">Cluwak</option>
                                                        <option value="33.18.20">Dukuhseti</option>
                                                        <option value="33.18.11">Gabus</option>
                                                        <option value="33.18.13">Gembong</option>
                                                        <option value="33.18.17">Gunungwungkal</option>
                                                        <option value="33.18.06">Jaken</option>
                                                        <option value="33.18.09">Jakenan</option>
                                                        <option value="33.18.08">Juwana</option>
                                                        <option value="33.18.02">Kayen</option>
                                                        <option value="33.18.12">Margorejo</option>
                                                        <option value="33.18.16">Margoyoso</option>
                                                        <option value="33.18.10">Pati</option>
                                                        <option value="33.18.15">Pucakwangi</option>
                                                        <option value="33.18.01">Sukolilo</option>
                                                        <option value="33.18.03">Tambakromo</option>
                                                        <option value="33.18.19">Tayu</option>
                                                        <option value="33.18.14">Tlogowungu</option>
                                                        <option value="33.18.21">Trangkil</option>
                                                        <option value="33.18.15">Wedarijaksa</option>
                                                        <option value="33.18.04">Winong</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="kelurahan" class="text-capitalize">desa /
                                                        kelurahan</label>
                                                    <select name="kelurahan" id="kelurahan"
                                                        class="form-control"></select>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="stratakelurahan" class="text-capitalize">strata
                                                        desa
                                                        / kelurahan</label>
                                                    <input type="text" name="stratakelurahan" id="stratakelurahan"
                                                        class="form-control" value="{{ old('stratakelurahan') }}">
                                                </div>
                                                <div class="form-group col-lg-2">
                                                    <label for="rtrw" class="text-capitalize">banjar atau rt /
                                                        rw</label>
                                                    <input type="text" name="rtrw" id="rtrw" class="form-control"
                                                        value="{{ old('rtrw') }}">
                                                </div>
                                                <div class="form-group col-lg-2">
                                                    <label for="nourutresponden" class="text-capitalize">no urut
                                                        responden</label>
                                                    <input type="text" name="nourutresponden" id="nourutresponden"
                                                        class="form-control" value="{{ old('nourutresponden') }}">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="nokuesioner" class="text-capitalize">no
                                                        kuesioner</label>
                                                    <input type="text" name="nokuesioner" id="nokuesioner"
                                                        class="form-control" value="{{ old('nokuesioner') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion">
                                        <div class="accordion-header text-uppercase collapsed d-flex" role="button"
                                            data-toggle="collapse" data-target="#panel-body-2" aria-expanded="true">
                                            <h4 class="mr-auto">A. Informasi Umum</h4>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24"
                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                <path
                                                    d="M11.178 19.569a.998.998 0 0 0 1.644 0l9-13A.999.999 0 0 0 21 5H3a1.002 1.002 0 0 0-.822 1.569l9 13z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                                            <div class="row">
                                                <div class="form-group col-lg-2">
                                                    <label for="tanggal_survei">Tanggal Survei</label>
                                                    <input type="date" name="tanggal_survei" id="tanggal_survei"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="jam_mulai_wawancara">Jam Mulai Wawancara</label>
                                                    <input type="time" name="jam_mulai_wawancara"
                                                        id="jam_mulai_wawancara" class="form-control">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="jam_selesai_wawancara">Jam Selesai Wawancara</label>
                                                    <input type="time" name="jam_selesai_wawancara"
                                                        id="jam_selesai_wawancara" class="form-control">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="nama_wawancara">Nama Pewawancara / Enumerator</label>
                                                    <input type="text" name="nama_wawancara" id="nama_wawancara"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="nama_supervisor">Nama Supervisor</label>
                                                    <input type="text" name="nama_supervisor" id="nama_supervisor"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="nama_koordinator_kecamatan">Nama Koordinator
                                                        Kecamatan</label>
                                                    <input type="text" name="nama_koordinator_kecamatan"
                                                        id="nama_koordinator_kecamatan" class="form-control">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="nama_kepala_rumah_tangga">Nama Kepala Rumah
                                                        Tangga</label>
                                                    <input type="text" name="nama_kepala_rumah_tangga"
                                                        id="nama_kepala_rumah_tangga" class="form-control">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="jumlah_keluarga_rumah_tangga">Jumlah Keluarga Dalam
                                                        Rumah Tangga</label>
                                                    <input type="text" name="jumlah_keluarga_rumah_tangga"
                                                        id="jumlah_keluarga_rumah_tangga" class="form-control">
                                                </div>
                                                <div class="form-group col-lg-8">
                                                    <label for="">Jumlah Jiwa Dalam Rumah</label>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <table width="100%">
                                                                <tr>
                                                                    <td>
                                                                        <label for="" class="">Laki-laki</label>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="jumlah_jiwa_laki_laki"
                                                                            id="jumlah_jiwa_laki_laki"
                                                                            class="form-control">
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <table width="100%">
                                                                <tr>
                                                                    <td>
                                                                        <label for="" class="">Perempuan</label>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="jumlah_jiwa_perempuan"
                                                                            id="jumlah_jiwa_perempuan"
                                                                            class="form-control">
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="nama_responden">Nama Responden</label>
                                                    <input type="text" name="nama_responden" id="nama_responden"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="hubungan_dengan_kepala_rumah_tangga">Hubungan Responden
                                                        Dg Kepala Rumah Tangga</label>
                                                    <input type="text" name="hubungan_dengan_kepala_rumah_tangga"
                                                        id="hubungan_dengan_kepala_rumah_tangga" class="form-control">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="alamat_telepon">Alamat / Telepon</label>
                                                    <input type="text" name="alamat_telepon" id="alamat_telepon"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            @foreach($questionnaire->questions as $question)
                            <div class="form-group col-lg-12">
                                <label>{{ $loop->iteration }}. {{ $question->question_text }}</label>
                                @if($question->type == 'text')
                                <div class="form-group">
                                    <input type="text" name="answers[{{ $question->id }}]"
                                        id="answers[{{ $question->id }}]" class="form-control">
                                </div>
                                @else
                                @foreach($question->options as $option)
                                <div class="form-check">
                                    <!-- Perubahan name field dari responses menjadi answers -->
                                    <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                        value="{{ $option->option_text }}" id="option{{ $option->id }}" {{
                                        old("answers.{$question->id}") == $option->option_text ? 'checked' : '' }}>
                                    <label class="form-check-label" for="option{{ $option->id }}">
                                        {{ $option->option_text }}
                                    </label>
                                </div>
                                @endforeach
                                @endif

                                @error("answers.{$question->id}")
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit Responses</button>
                    </form>
                    @else
                    <p>Tidak ada pertanyaan untuk kuesioner ini.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        changekecamatan();
    })
    function changekecamatan() {
        let v = $('#kecamatan').val();
        let listkelurahan = '';
        if(v == '33.18.07'){
            listkelurahan+='<option value="Batursari">Batursari</option>';
            listkelurahan+='<option value="Bulumulyo">Bulumulyo</option>';
            listkelurahan+='<option value="Bumimulyo">Bumimulyo</option>';
            listkelurahan+='<option value="Gajahkumpul">Gajahkumpul</option>';
            listkelurahan+='<option value="Gunungsari">Gunungsari</option>';
            listkelurahan+='<option value="Jembangan">Jembangan</option>';
            listkelurahan+='<option value="Kedalon">Kedalon</option>';
            listkelurahan+='<option value="Ketitangwetan">Ketitangwetan</option>';
            listkelurahan+='<option value="Klayusiwalan">Klayusiwalan</option>';
            listkelurahan+='<option value="Kuniran">Kuniran</option>';
            listkelurahan+='<option value="Lengkong">Lengkong</option>';
            listkelurahan+='<option value="Mangunlegi">Mangunlegi</option>';
            listkelurahan+='<option value="Ngening">Ngening</option>';
            listkelurahan+='<option value="Pecangaan">Pecangaan</option>';
            listkelurahan+='<option value="Raci">Raci</option>';
            listkelurahan+='<option value="Sukoagung">Sukoagung</option>';
            listkelurahan+='<option value="Tlogomojo">Tlogomojo</option>';
            listkelurahan+='<option value="Tompomulyo">Tompomulyo</option>';
        }
        if(v == '33.18.18'){
            listkelurahan+='<option value="Bleber">Bleber</option>';
            listkelurahan+='<option value="Gerit">Gerit</option>';
            listkelurahan+='<option value="Gesengan">Gesengan</option>';
            listkelurahan+='<option value="Karangsari">Karangsari</option>';
            listkelurahan+='<option value="Medani">Medani</option>';
            listkelurahan+='<option value="MojoNgablak">MojoNgablak</option>';
            listkelurahan+='<option value="Ngawen">Ngawen</option>';
            listkelurahan+='<option value="Payak">Payak</option>';
            listkelurahan+='<option value="Plaosan">Plaosan</option>';
            listkelurahan+='<option value="Sentul">Sentul</option>';
            listkelurahan+='<option value="Sirahan">Sirahan</option>';
            listkelurahan+='<option value="Sumur">Sumur</option>';
        }
        if(v == '33.18.20'){
            listkelurahan+='<option value="Alasdowo">Alasdowo</option>';
            listkelurahan+='<option value="Bakalan">Bakalan</option>';
            listkelurahan+='<option value="Banyutowo">Banyutowo</option>';
            listkelurahan+='<option value="Dukuhseti">Dukuhseti</option>';
            listkelurahan+='<option value="Dumpil">Dumpil</option>';
            listkelurahan+='<option value="Grogolan">Grogolan</option>';
            listkelurahan+='<option value="Kembang">Kembang</option>';
            listkelurahan+='<option value="Kenanti">Kenanti</option>';
            listkelurahan+='<option value="Ngagel">Ngagel</option>';
            listkelurahan+='<option value="Puncel">Puncel</option>';
            listkelurahan+='<option value="Tegalombo">Tegalombo</option>';
            listkelurahan+='<option value="Wedusan">Wedusan</option>';
        }
        if(v == '33.18.11'){
            listkelurahan+='<option value="Babalan">Babalan</option>';
            listkelurahan+='<option value="Banjarsari">Banjarsari</option>';
            listkelurahan+='<option value="Bogotanjung">Bogotanjung</option>';
            listkelurahan+='<option value="Gabus">Gabus</option>';
            listkelurahan+='<option value="Gebang">Gebang</option>';
            listkelurahan+='<option value="Gempolsari">Gempolsari</option>';
            listkelurahan+='<option value="Karaban">Karaban</option>';
            listkelurahan+='<option value="Kosekan">Kosekan</option>';
            listkelurahan+='<option value="Koripandriyo">Koripandriyo</option>';
            listkelurahan+='<option value="Koryokalangan">Koryokalangan</option>';
            listkelurahan+='<option value="Mintobasuki">Mintobasuki</option>';
            listkelurahan+='<option value="Mojolawaran">Mojolawaran</option>';
            listkelurahan+='<option value="Pantirejo">Pantirejo</option>';
            listkelurahan+='<option value="Penanggungan">Penanggungan</option>';
            listkelurahan+='<option value="Plumbungan">Plumbungan</option>';
            listkelurahan+='<option value="Sambirejo">Sambirejo</option>';
            listkelurahan+='<option value="SokoSugihrejo">SokoSugihrejo</option>';
            listkelurahan+='<option value="Sunggingwarno">Sunggingwarno</option>';
            listkelurahan+='<option value="Tambahmulyo">Tambahmulyo</option>';
            listkelurahan+='<option value="Tanjang">Tanjang</option>';
            listkelurahan+='<option value="Tanjunganom">Tanjunganom</option>';
            listkelurahan+='<option value="Tlogoayu">Tlogoayu</option>';
            listkelurahan+='<option value="Wuwur">Wuwur</option>';
        }
        if(v == '33.18.13'){
            listkelurahan+='<option value="Bageng">Bageng</option>';
            listkelurahan+='<option value="Bermi">Bermi</option>';
            listkelurahan+='<option value="Gembong">Gembong</option>';
            listkelurahan+='<option value="Kedungbulus">Kedungbulus</option>';
            listkelurahan+='<option value="Ketanggan">Ketanggan</option>';
            listkelurahan+='<option value="KlakahKasian">KlakahKasian</option>';
            listkelurahan+='<option value="Plukaran">Plukaran</option>';
            listkelurahan+='<option value="Pohgading">Pohgading</option>';
            listkelurahan+='<option value="Semirejo">Semirejo</option>';
            listkelurahan+='<option value="Sitiluhur">Sitiluhur</option>';
            listkelurahan+='<option value="Wonosekar">Wonosekar</option>';
        }
        if(v == '33.18.17'){
            listkelurahan+='<option value="Bancak">Bancak</option>';
            listkelurahan+='<option value="Gadu">Gadu</option>';
            listkelurahan+='<option value="Gajihan">Gajihan</option>';
            listkelurahan+='<option value="Giling">Giling</option>';
            listkelurahan+='<option value="Gulangpungge">Gulangpungge</option>';
            listkelurahan+='<option value="Gunungwungkal">Gunungwungkal</option>';
            listkelurahan+='<option value="Jembulwunut">Jembulwunut</option>';
            listkelurahan+='<option value="Jepalo">Jepalo</option>';
            listkelurahan+='<option value="Jrahi">Jrahi</option>';
            listkelurahan+='<option value="Ngetuk">Ngetuk</option>';
            listkelurahan+='<option value="Perdopo">Perdopo</option>';
            listkelurahan+='<option value="Pesagen">Pesagen</option>';
            listkelurahan+='<option value="Sampok">Sampok</option>';
            listkelurahan+='<option value="Sidomulyo">Sidomulyo</option>';
            listkelurahan+='<option value="Sumberejo">Sumberejo</option>';
        }
        if(v == '33.18.06'){
            listkelurahan+='<option value="Aromanis">Aromanis</option>';
            listkelurahan+='<option value="Boto">Boto</option>';
            listkelurahan+='<option value="Kebonturi">Kebonturi</option>';
            listkelurahan+='<option value="Lundo">Lundo</option>';
            listkelurahan+='<option value="Manjang">Manjang</option>';
            listkelurahan+='<option value="Mantingan">Mantingan</option>';
            listkelurahan+='<option value="Mojolampir">Mojolampir</option>';
            listkelurahan+='<option value="Mojoluhur">Mojoluhur</option>';
            listkelurahan+='<option value="Ronggo">Ronggo</option>';
            listkelurahan+='<option value="Sidoluhur">Sidoluhur</option>';
            listkelurahan+='<option value="Sidomukti">Sidomukti</option>';
            listkelurahan+='<option value="Srikaton">Srikaton</option>';
            listkelurahan+='<option value="Sriwedari">Sriwedari</option>';
            listkelurahan+='<option value="Sukorukun">Sukorukun</option>';
            listkelurahan+='<option value="Sumberagung">Sumberagung</option>';
            listkelurahan+='<option value="Sumberan">Sumberan</option>';
            listkelurahan+='<option value="Sumberarum">Sumberarum</option>';
            listkelurahan+='<option value="Sumberrejo">Sumberrejo</option>';
            listkelurahan+='<option value="Tamansari">Tamansari</option>';
            listkelurahan+='<option value="Tegalarum">Tegalarum</option>';
            listkelurahan+='<option value="Trikoyo">Trikoyo</option>';
        }
        if(v == '33.18.09'){
            listkelurahan+='<option value="Bungasrejo">Bungasrejo</option>';
            listkelurahan+='<option value="Dukuhmulyo">Dukuhmulyo</option>';
            listkelurahan+='<option value="Glonggong">Glonggong</option>';
            listkelurahan+='<option value="Jakenan">Jakenan</option>';
            listkelurahan+='<option value="Jatisari">Jatisari</option>';
            listkelurahan+='<option value="Kalimulyo">Kalimulyo</option>';
            listkelurahan+='<option value="KarangrejoLor">KarangrejoLor</option>';
            listkelurahan+='<option value="Karangrowo">Karangrowo</option>';
            listkelurahan+='<option value="Kedungmulyo">Kedungmulyo</option>';
            listkelurahan+='<option value="MantinganTengah">MantinganTengah</option>';
            listkelurahan+='<option value="Ngastorejo">Ngastorejo</option>';
            listkelurahan+='<option value="Plosojenar">Plosojenar</option>';
            listkelurahan+='<option value="PuluhanTengah">PuluhanTengah</option>';
            listkelurahan+='<option value="Sembaturagung">Sembaturagung</option>';
            listkelurahan+='<option value="Sendangsoko">Sendangsoko</option>';
            listkelurahan+='<option value="Sidoarum">Sidoarum</option>';
            listkelurahan+='<option value="Sidomulyo">Sidomulyo</option>';
            listkelurahan+='<option value="Sonorejo">Sonorejo</option>';
            listkelurahan+='<option value="Tambahmulyo">Tambahmulyo</option>';
            listkelurahan+='<option value="Tanjungsari">Tanjungsari</option>';
            listkelurahan+='<option value="Tlogorejo">Tlogorejo</option>';
            listkelurahan+='<option value="Tondokerto">Tondokerto</option>';
            listkelurahan+='<option value="Tondomulyo">Tondomulyo</option>';
        }
        if(v == '33.18.08'){
            listkelurahan+='<option value="Agungmulyo">Agungmulyo</option>';
            listkelurahan+='<option value="Bajomulyo">Bajomulyo</option>';
            listkelurahan+='<option value="Bakarankulon">Bakarankulon</option>';
            listkelurahan+='<option value="Bakaranwetan">Bakaranwetan</option>';
            listkelurahan+='<option value="Bendar">Bendar</option>';
            listkelurahan+='<option value="Bringin">Bringin</option>';
            listkelurahan+='<option value="Bumirejo">Bumirejo</option>';
            listkelurahan+='<option value="Doropayung">Doropayung</option>';
            listkelurahan+='<option value="Dukutalit">Dukutalit</option>';
            listkelurahan+='<option value="Gadingrejo">Gadingrejo</option>';
            listkelurahan+='<option value="Genengmulyo">Genengmulyo</option>';
            listkelurahan+='<option value="Growongkidul">Growongkidul</option>';
            listkelurahan+='<option value="Growonglor">Growonglor</option>';
            listkelurahan+='<option value="Jepuro">Jepuro</option>';
            listkelurahan+='<option value="Karang">Karang</option>';
            listkelurahan+='<option value="Karangrejo">Karangrejo</option>';
            listkelurahan+='<option value="Kauman">Kauman</option>';
            listkelurahan+='<option value="Kebonsawahan">Kebonsawahan</option>';
            listkelurahan+='<option value="Kedungpancing">Kedungpancing</option>';
            listkelurahan+='<option value="Ketip">Ketip</option>';
            listkelurahan+='<option value="Kudukeras">Kudukeras</option>';
            listkelurahan+='<option value="Langenharjo">Langenharjo</option>';
            listkelurahan+='<option value="Margomulyo">Margomulyo</option>';
            listkelurahan+='<option value="Mintomulyo">Mintomulyo</option>';
            listkelurahan+='<option value="Pajeksan">Pajeksan</option>';
            listkelurahan+='<option value="Pekuwon">Pekuwon</option>';
            listkelurahan+='<option value="Sejomulyo">Sejomulyo</option>';
            listkelurahan+='<option value="Tluwah">Tluwah</option>';
            listkelurahan+='<option value="Trimulyo">Trimulyo</option>';

        }
        if(v == '33.18.02'){
            listkelurahan+='<option value="Beketel">Beketel</option>';
            listkelurahan+='<option value="Boloagung">Boloagung</option>';
            listkelurahan+='<option value="Brati">Brati</option>';
            listkelurahan+='<option value="Durensawit">Durensawit</option>';
            listkelurahan+='<option value="Jatiroto">Jatiroto</option>';
            listkelurahan+='<option value="Jimbaran">Jimbaran</option>';
            listkelurahan+='<option value="Kayen">Kayen</option>';
            listkelurahan+='<option value="Pasuruhan">Pasuruhan</option>';
            listkelurahan+='<option value="Pesagi">Pesagi</option>';
            listkelurahan+='<option value="Purwokerto">Purwokerto</option>';
            listkelurahan+='<option value="Rogomulyo">Rogomulyo</option>';
            listkelurahan+='<option value="Slungkep">Slungkep</option>';
            listkelurahan+='<option value="Srikaton">Srikaton</option>';
            listkelurahan+='<option value="Sumbersari">Sumbersari</option>';
            listkelurahan+='<option value="Sundoluhur">Sundoluhur</option>';
            listkelurahan+='<option value="Talun">Talun</option>';
            listkelurahan+='<option value="Trimulyo">Trimulyo</option>';
            
        }
        if(v == '33.18.12'){
            listkelurahan+='<option value="Badegan">Badegan</option>';
            listkelurahan+='<option value="Banyuurip">Banyuurip</option>';
            listkelurahan+='<option value="Bumirejo">Bumirejo</option>';
            listkelurahan+='<option value="Dadirejo">Dadirejo</option>';
            listkelurahan+='<option value="JambeanKidul">JambeanKidul</option>';
            listkelurahan+='<option value="Jimbaran">Jimbaran</option>';
            listkelurahan+='<option value="Langenharjo">Langenharjo</option>';
            listkelurahan+='<option value="Langse">Langse</option>';
            listkelurahan+='<option value="Margorejo">Margorejo</option>';
            listkelurahan+='<option value="Metaraman">Metaraman</option>';
            listkelurahan+='<option value="Muktiharjo">Muktiharjo</option>';
            listkelurahan+='<option value="Ngawen">Ngawen</option>';
            listkelurahan+='<option value="Pegandan">Pegandan</option>';
            listkelurahan+='<option value="Penambuhan">Penambuhan</option>';
            listkelurahan+='<option value="Sokokulon">Sokokulon</option>';
            listkelurahan+='<option value="Sukobubuk">Sukobubuk</option>';
            listkelurahan+='<option value="Sukoharjo">Sukoharjo</option>';
            listkelurahan+='<option value="Wangunrejo">Wangunrejo</option>';
            
        }
        if(v == '33.18.16'){
            listkelurahan+='<option value="BulumanisKidul">BulumanisKidul</option>';
            listkelurahan+='<option value="BulumanisLor">BulumanisLor</option>';
            listkelurahan+='<option value="CebolekKidul">CebolekKidul</option>';
            listkelurahan+='<option value="Kajen">Kajen</option>';
            listkelurahan+='<option value="Kertomulyo">Kertomulyo</option>';
            listkelurahan+='<option value="Langgenharjo">Langgenharjo</option>';
            listkelurahan+='<option value="MargotuhuKidul">MargotuhuKidul</option>';
            listkelurahan+='<option value="Margoyoso">Margoyoso</option>';
            listkelurahan+='<option value="NgemplakKidul">NgemplakKidul</option>';
            listkelurahan+='<option value="NgemplakLor">NgemplakLor</option>';
            listkelurahan+='<option value="Pangkalan">Pangkalan</option>';
            listkelurahan+='<option value="Pohijo">Pohijo</option>';
            listkelurahan+='<option value="Purwodadi">Purwodadi</option>';
            listkelurahan+='<option value="Purworejo">Purworejo</option>';
            listkelurahan+='<option value="Sekarjalak">Sekarjalak</option>';
            listkelurahan+='<option value="Semerak">Semerak</option>';
            listkelurahan+='<option value="Sidomukti">Sidomukti</option>';
            listkelurahan+='<option value="Soneyan">Soneyan</option>';
            listkelurahan+='<option value="Tanjungrejo">Tanjungrejo</option>';
            listkelurahan+='<option value="Tegalarum">Tegalarum</option>';
            listkelurahan+='<option value="Tunjungrejo">Tunjungrejo</option>';
            listkelurahan+='<option value="Waturoyo">Waturoyo</option>';
            
        }
        if(v == '33.18.10'){
            listkelurahan+='<option value="Blaru">Blaru</option>';
            listkelurahan+='<option value="Dengkek">Dengkek</option>';
            listkelurahan+='<option value="Gajahmati">Gajahmati</option>';
            listkelurahan+='<option value="Geritan">Geritan</option>';
            listkelurahan+='<option value="Kutoharjo">Kutoharjo</option>';
            listkelurahan+='<option value="Mulyoharjo">Mulyoharjo</option>';
            listkelurahan+='<option value="Mustokoharjo">Mustokoharjo</option>';
            listkelurahan+='<option value="Ngarus">Ngarus</option>';
            listkelurahan+='<option value="Ngepungrejo">Ngepungrejo</option>';
            listkelurahan+='<option value="Panjunan">Panjunan</option>';
            listkelurahan+='<option value="Payang">Payang</option>';
            listkelurahan+='<option value="Plangitan">Plangitan</option>';
            listkelurahan+='<option value="Puri">Puri</option>';
            listkelurahan+='<option value="Purworejo">Purworejo</option>';
            listkelurahan+='<option value="Sarirejo">Sarirejo</option>';
            listkelurahan+='<option value="Semampir">Semampir</option>';
            listkelurahan+='<option value="Sidoharjo">Sidoharjo</option>';
            listkelurahan+='<option value="Sidokerto">Sidokerto</option>';
            listkelurahan+='<option value="Sinoman">Sinoman</option>';
            listkelurahan+='<option value="Sugiharjo">Sugiharjo</option>';
            listkelurahan+='<option value="Tambaharjo">Tambaharjo</option>';
            listkelurahan+='<option value="Tambahsari">Tambahsari</option>';
            listkelurahan+='<option value="Widorokandang">Widorokandang</option>';
            listkelurahan+='<option value="Winong">Winong</option>';
            listkelurahan+='<option value="PatiWetan">PatiWetan</option>';
            listkelurahan+='<option value="PatiKidul">PatiKidul</option>';
            listkelurahan+='<option value="PatiLor">PatiLor</option>';
            listkelurahan+='<option value="Parenggan">Parenggan</option>';
            listkelurahan+='<option value="Kalidoro">Kalidoro</option>';
        }
        if(v == '33.18.15'){
            listkelurahan+='<option value="Bodeh">Bodeh</option>';
            listkelurahan+='<option value="Grogolsari">Grogolsari</option>';
            listkelurahan+='<option value="Jetak">Jetak</option>';
            listkelurahan+='<option value="Karangrejo">Karangrejo</option>';
            listkelurahan+='<option value="Karangwotan">Karangwotan</option>';
            listkelurahan+='<option value="Kepohkencono">Kepohkencono</option>';
            listkelurahan+='<option value="Kletek">Kletek</option>';
            listkelurahan+='<option value="Lumbungmas">Lumbungmas</option>';
            listkelurahan+='<option value="Mencon">Mencon</option>';
            listkelurahan+='<option value="Mojoagung">Mojoagung</option>';
            listkelurahan+='<option value="Pelemgede">Pelemgede</option>';
            listkelurahan+='<option value="Plosorejo">Plosorejo</option>';
            listkelurahan+='<option value="Pucakwangi">Pucakwangi</option>';
            listkelurahan+='<option value="Sitimulyo">Sitimulyo</option>';
            listkelurahan+='<option value="Sokopuluhan">Sokopuluhan</option>';
            listkelurahan+='<option value="Tanjungsekar">Tanjungsekar</option>';
            listkelurahan+='<option value="Tegalwero">Tegalwero</option>';
            listkelurahan+='<option value="Terteg">Terteg</option>';
            listkelurahan+='<option value="Triguno">Triguno</option>';
            listkelurahan+='<option value="Wateshaji">Wateshaji</option>';
        }
        if(v == '33.18.01'){
            listkelurahan+='<option value="Baleadi">Baleadi</option>';
            listkelurahan+='<option value="Baturejo">Baturejo</option>';
            listkelurahan+='<option value="Cengkalsewu">Cengkalsewu</option>';
            listkelurahan+='<option value="Gadudero">Gadudero</option>';
            listkelurahan+='<option value="Kasiyan">Kasiyan</option>';
            listkelurahan+='<option value="Kedumulyo">Kedumulyo</option>';
            listkelurahan+='<option value="Kedungwinong">Kedungwinong</option>';
            listkelurahan+='<option value="Kuwawur">Kuwawur</option>';
            listkelurahan+='<option value="Pakem">Pakem</option>';
            listkelurahan+='<option value="PorangParing">PorangParing</option>';
            listkelurahan+='<option value="Prawoto">Prawoto</option>';
            listkelurahan+='<option value="Sukolilo">Sukolilo</option>';
            listkelurahan+='<option value="Sumbersoko">Sumbersoko</option>';
            listkelurahan+='<option value="Tompegunung">Tompegunung</option>';
            listkelurahan+='<option value="Wegil">Wegil</option>';
            listkelurahan+='<option value="Wotan">Wotan</option>';
        }
        if(v == '33.18.03'){
            listkelurahan+='<option value="AngkatanKidul">AngkatanKidul</option>';
            listkelurahan+='<option value="AngkatanLor">AngkatanLor</option>';
            listkelurahan+='<option value="Karangawen">Karangawen</option>';
            listkelurahan+='<option value="Karangmulyo">Karangmulyo</option>';
            listkelurahan+='<option value="Karangwono">Karangwono</option>';
            listkelurahan+='<option value="Keben">Keben</option>';
            listkelurahan+='<option value="Kedalingan">Kedalingan</option>';
            listkelurahan+='<option value="Larangan">Larangan</option>';
            listkelurahan+='<option value="Maitan">Maitan</option>';
            listkelurahan+='<option value="Mangunrekso">Mangunrekso</option>';
            listkelurahan+='<option value="Mojomulyo">Mojomulyo</option>';
            listkelurahan+='<option value="Pakis">Pakis</option>';
            listkelurahan+='<option value="Sinomwidodo">Sinomwidodo</option>';
            listkelurahan+='<option value="Sitirejo">Sitirejo</option>';
            listkelurahan+='<option value="Tambahagung">Tambahagung</option>';
            listkelurahan+='<option value="Tambaharjo">Tambaharjo</option>';
            listkelurahan+='<option value="Tambakromo">Tambakromo</option>';
            listkelurahan+='<option value="Wukirsari">Wukirsari</option>';
        }
        if(v == '33.18.19'){
            listkelurahan+='<option value="BendokatonKidul">BendokatonKidul</option>';
            listkelurahan+='<option value="Bulungan">Bulungan</option>';
            listkelurahan+='<option value="Dororejo">Dororejo</option>';
            listkelurahan+='<option value="JepatKidul">JepatKidul</option>';
            listkelurahan+='<option value="JepatLor">JepatLor</option>';
            listkelurahan+='<option value="Kalikalong">Kalikalong</option>';
            listkelurahan+='<option value="Keboromo">Keboromo</option>';
            listkelurahan+='<option value="Kedungbang">Kedungbang</option>';
            listkelurahan+='<option value="Kedungsari">Kedungsari</option>';
            listkelurahan+='<option value="Luwang">Luwang</option>';
            listkelurahan+='<option value="Margomulyo">Margomulyo</option>';
            listkelurahan+='<option value="Pakis">Pakis</option>';
            listkelurahan+='<option value="Pondowan">Pondowan</option>';
            listkelurahan+='<option value="Pundenrejo">Pundenrejo</option>';
            listkelurahan+='<option value="Purwokerto">Purwokerto</option>';
            listkelurahan+='<option value="Sambiroto">Sambiroto</option>';
            listkelurahan+='<option value="Sendangrejo">Sendangrejo</option>';
            listkelurahan+='<option value="Tayukulon">Tayukulon</option>';
            listkelurahan+='<option value="Tayuwetan">Tayuwetan</option>';
            listkelurahan+='<option value="Tendas">Tendas</option>';
            listkelurahan+='<option value="Tunggulsari">Tunggulsari</option>';
        }
        if(v == '33.18.14'){
            listkelurahan+='<option value="Cabak">Cabak</option>';
            listkelurahan+='<option value="Gunungsari">Gunungsari</option>';
            listkelurahan+='<option value="Guwo">Guwo</option>';
            listkelurahan+='<option value="Klumpit">Klumpit</option>';
            listkelurahan+='<option value="Lahar">Lahar</option>';
            listkelurahan+='<option value="Purwosari">Purwosari</option>';
            listkelurahan+='<option value="Regaloh">Regaloh</option>';
            listkelurahan+='<option value="Sambirejo">Sambirejo</option>';
            listkelurahan+='<option value="Sumbermulyo">Sumbermulyo</option>';
            listkelurahan+='<option value="Suwatu">Suwatu</option>';
            listkelurahan+='<option value="Tajungsari">Tajungsari</option>';
            listkelurahan+='<option value="Tamansari">Tamansari</option>';
            listkelurahan+='<option value="Tlogorejo">Tlogorejo</option>';
            listkelurahan+='<option value="Tlogosari">Tlogosari</option>';
            listkelurahan+='<option value="Wonorejo">Wonorejo</option>';
        }
        if(v == '33.18.21'){
            listkelurahan+='<option value="Asempapan">Asempapan</option>';
            listkelurahan+='<option value="Guyangan">Guyangan</option>';
            listkelurahan+='<option value="Kadilangu">Kadilangu</option>';
            listkelurahan+='<option value="Kajar">Kajar</option>';
            listkelurahan+='<option value="Karanglegi">Karanglegi</option>';
            listkelurahan+='<option value="Karangwage">Karangwage</option>';
            listkelurahan+='<option value="Kertomulyo">Kertomulyo</option>';
            listkelurahan+='<option value="Ketanen">Ketanen</option>';
            listkelurahan+='<option value="Krandan">Krandan</option>';
            listkelurahan+='<option value="Mojoagung">Mojoagung</option>';
            listkelurahan+='<option value="Pasucen">Pasucen</option>';
            listkelurahan+='<option value="Rejoagung">Rejoagung</option>';
            listkelurahan+='<option value="Sambilawang">Sambilawang</option>';
            listkelurahan+='<option value="Tegalharjo">Tegalharjo</option>';
            listkelurahan+='<option value="Tlutup">Tlutup</option>';
            listkelurahan+='<option value="Trangkil">Trangkil</option>';
        }
        if(v == '33.18.15'){
            listkelurahan+='<option value="Bangsalrejo">Bangsalrejo</option>';
            listkelurahan+='<option value="Bumiayu">Bumiayu</option>';
            listkelurahan+='<option value="Jatimulyo">Jatimulyo</option>';
            listkelurahan+='<option value="Jetak">Jetak</option>';
            listkelurahan+='<option value="Jontro">Jontro</option>';
            listkelurahan+='<option value="Kepoh">Kepoh</option>';
            listkelurahan+='<option value="Margorejo">Margorejo</option>';
            listkelurahan+='<option value="Ngurenrejo">Ngurenrejo</option>';
            listkelurahan+='<option value="Ngurensiti">Ngurensiti</option>';
            listkelurahan+='<option value="Pagerharjo">Pagerharjo</option>';
            listkelurahan+='<option value="Panggungroyom">Panggungroyom</option>';
            listkelurahan+='<option value="Sidoharjo">Sidoharjo</option>';
            listkelurahan+='<option value="Sukoharjo">Sukoharjo</option>';
            listkelurahan+='<option value="Suwaduk">Suwaduk</option>';
            listkelurahan+='<option value="Tawangharjo">Tawangharjo</option>';
            listkelurahan+='<option value="Tlogoharum">Tlogoharum</option>';
            listkelurahan+='<option value="Tluwuk">Tluwuk</option>';
            listkelurahan+='<option value="Wedarijaksa">Wedarijaksa</option>';
        }
        if(v == '33.18.04'){
listkelurahan+='<option value="            Blingijati">            Blingijati</option>';
            listkelurahan+='<option value="Bringinwareng">Bringinwareng</option>';
            listkelurahan+='<option value="Bumiharjo">Bumiharjo</option>';
            listkelurahan+='<option value="Danyangmulyo">Danyangmulyo</option>';
            listkelurahan+='<option value="Degan">Degan</option>';
            listkelurahan+='<option value="Godo">Godo</option>';
            listkelurahan+='<option value="Gunungpanti">Gunungpanti</option>';
            listkelurahan+='<option value="Guyangan">Guyangan</option>';
            listkelurahan+='<option value="Karangkonang">Karangkonang</option>';
            listkelurahan+='<option value="Karangsumber">Karangsumber</option>';
            listkelurahan+='<option value="Kebolampang">Kebolampang</option>';
            listkelurahan+='<option value="Kebowan">Kebowan</option>';
            listkelurahan+='<option value="Klecoregonang">Klecoregonang</option>';
            listkelurahan+='<option value="Kropak">Kropak</option>';
            listkelurahan+='<option value="Kudur">Kudur</option>';
            listkelurahan+='<option value="Mintorahayu">Mintorahayu</option>';
            listkelurahan+='<option value="Padangan">Padangan</option>';
            listkelurahan+='<option value="Pagendisan">Pagendisan</option>';
            listkelurahan+='<option value="Pekalongan">Pekalongan</option>';
            listkelurahan+='<option value="Pohgading">Pohgading</option>';
            listkelurahan+='<option value="Pulorejo">Pulorejo</option>';
            listkelurahan+='<option value="Sarimulyo">Sarimulyo</option>';
            listkelurahan+='<option value="Serutsadang">Serutsadang</option>';
            listkelurahan+='<option value="Sugihan">Sugihan</option>';
            listkelurahan+='<option value="Sumbermulyo">Sumbermulyo</option>';
            listkelurahan+='<option value="Tanggel">Tanggel</option>';
            listkelurahan+='<option value="Tawangrejo">Tawangrejo</option>';
            listkelurahan+='<option value="Tlogorejo">Tlogorejo</option>';
            listkelurahan+='<option value="Winong">Winong</option>';
            listkelurahan+='<option value="Wirun">Wirun</option>';
        }
        $('#kelurahan').html(listkelurahan);
    }
</script>
@endsection