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
                                <div id="accordion">
                                    <div class="accordion">
                                        <div class="accordion-header text-uppercase" role="button"
                                            data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                                            <h4>Data Wilayah</h4>
                                        </div>
                                        <div class="accordion-body collapse show" id="panel-body-1"
                                            data-parent="#accordion">
                                            <div class="row">

                                                <!-- Optional: Field untuk email responden -->
                                                <div class="form-group col-lg-4" hidden>
                                                    <label>Email Responden (Opsionals)</label>
                                                    <input type="email" name="respondent_email" class="form-control"
                                                        value="{{ old('respondent_email') }}">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="propinsi" class="text-capitalize">Propinsi</label>
                                                    <input type="text" name="propinsi" id="propinsi"
                                                        class="form-control" value="Jawa Tengah" readonly>
                                                </div>
                                                <div class="form-group col-lg-4">
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
                                                <div class="form-group col-lg-4">
                                                    <label for="rtrw" class="text-capitalize">banjar atau rt /
                                                        rw</label>
                                                    <input type="text" name="rtrw" id="rtrw" class="form-control"
                                                        value="{{ old('rtrw') }}">
                                                </div>
                                                <div class="form-group col-lg-4">
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
                                        <div class="accordion-header text-uppercase" role="button"
                                            data-toggle="collapse" data-target="#panel-body-2" aria-expanded="false">
                                            <h4>A. Informasi Umum</h4>
                                        </div>
                                        <div class="accordion-body" id="panel-body-2" data-parent="#accordion">
                                            <div class="row">

                                                <!-- Optional: Field untuk email responden -->
                                                <div class="form-group col-lg-4" hidden>
                                                    <label>Email Responden (Opsionals)</label>
                                                    <input type="email" name="respondent_email" class="form-control"
                                                        value="{{ old('respondent_email') }}">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="propinsi" class="text-capitalize">Propinsi</label>
                                                    <input type="text" name="propinsi" id="propinsi"
                                                        class="form-control" value="{{ old('propinsi') }}">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="kabupaten" class="text-capitalize">kabupaten /
                                                        kota</label>
                                                    <input type="text" name="kabupaten" id="kabupaten"
                                                        class="form-control" value="{{ old('kabupaten') }}">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="kecamatan" class="text-capitalize">kecamatan</label>
                                                    <input type="text" name="kecamatan" id="kecamatan"
                                                        class="form-control" value="{{ old('kecamatan') }}">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="kelurahan" class="text-capitalize">desa /
                                                        kelurahan</label>
                                                    <input type="text" name="kelurahan" id="kelurahan"
                                                        class="form-control" value="{{ old('kelurahan') }}">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="stratakelurahan" class="text-capitalize">strata
                                                        desa
                                                        / kelurahan</label>
                                                    <input type="text" name="stratakelurahan" id="stratakelurahan"
                                                        class="form-control" value="{{ old('stratakelurahan') }}">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="rtrw" class="text-capitalize">banjar atau rt /
                                                        rw</label>
                                                    <input type="text" name="rtrw" id="rtrw" class="form-control"
                                                        value="{{ old('rtrw') }}">
                                                </div>
                                                <div class="form-group col-lg-4">
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
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            @foreach($questionnaire->questions as $question)
                            <div class="form-group col-lg-12">
                                <label>{{ $loop->iteration }}. {{ $question->question_text }}</label>
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
            // BleberGeritGesenganKarangsariMedaniMojoNgablakNgawenPayakPlaosanSentulSirahanSumur
        }
        if(v == '33.18.20'){
            // AlasdowoBakalanBanyutowoDukuhsetiDumpilGrogolanKembangKenantiNgagelPuncelTegalomboWedusan
        }
        if(v == '33.18.11'){
            // BabalanBanjarsariBogotanjungGabusGebangGempolsariKarabanKosekanKoripandriyoKoryokalanganMintobasukiMojolawaranPantirejoPenanggunganPlumbunganSambirejoSokoSugihrejoSunggingwarnoTambahmulyoTanjangTanjunganomTlogoayuWuwur
        }
        if(v == '33.18.13'){
            // BagengBermiGembongKedungbulusKetangganKlakah KasianPlukaranPohgadingSemirejoSitiluhurWonosekar
        }
        if(v == '33.18.17'){
            // BancakGaduGajihanGilingGulangpunggeGunungwungkalJembulwunutJepaloJrahiNgetukPerdopoPesagenSampokSidomulyoSumberejo
        }
        if(v == '33.18.06'){
            // AromanisBotoKebonturiLundoManjangMantinganMojolampirMojoluhurRonggoSidoluhurSidomuktiSrikatonSriwedariSukorukunSumberagungSumberanSumberarumSumberrejoTamansariTegalarumTrikoyo
        }
        if(v == '33.18.09'){
            // BungasrejoDukuhmulyoGlonggongJakenanJatisariKalimulyoKarangrejo LorKarangrowoKedungmulyoMantingan TengahNgastorejoPlosojenarPuluhan TengahSembaturagungSendangsokoSidoarumSidomulyoSonorejoTambahmulyoTanjungsariTlogorejoTondokertoTondomulyo
        }
        if(v == '33.18.08'){
            // AgungmulyoBajomulyoBakarankulonBakaranwetanBendarBringinBumirejoDoropayungDukutalitGadingrejoGenengmulyoGrowongkidulGrowonglorJepuroKarangKarangrejoKaumanKebonsawahanKedungpancingKetipKudukerasLangenharjoMargomulyoMintomulyoPajeksanPekuwonSejomulyoTluwahTrimulyo

        }
        if(v == '33.18.02'){
            // BeketelBoloagungBratiDurensawitJatirotoJimbaranKayenPasuruhanPesagiPurwokertoRogomulyoSlungkepSrikatonSumbersariSundoluhurTalunTrimulyo
            
        }
        if(v == '33.18.12'){
            // BadeganBanyuuripBumirejoDadirejoJambean KidulJimbaranLangenharjoLangseMargorejoMetaramanMuktiharjoNgawenPegandanPenambuhanSokokulonSukobubukSukoharjoWangunrejo
            
        }
        if(v == '33.18.16'){
            // Bulumanis KidulBulumanis LorCebolek KidulKajenKertomulyoLanggenharjoMargotuhu KidulMargoyosoNgemplak KidulNgemplak LorPangkalanPohijoPurwodadiPurworejoSekarjalakSemerakSidomuktiSoneyanTanjungrejoTegalarumTunjungrejoWaturoyo
            
        }
        if(v == '33.18.10'){
            // BlaruDengkekGajahmatiGeritanKutoharjoMulyoharjoMustokoharjoNgarusNgepungrejoPanjunanPayangPlangitanPuriPurworejoSarirejoSemampirSidoharjoSidokertoSinomanSugiharjoTambaharjoTambahsariWidorokandangWinong
// Pati WetanPati KidulPati LorParengganKalidoro
        }
        if(v == '33.18.15'){
            // BodehGrogolsariJetakKarangrejoKarangwotanKepohkenconoKletekLumbungmasMenconMojoagungPelemgedePlosorejoPucakwangiSitimulyoSokopuluhanTanjungsekarTegalweroTertegTrigunoWateshaji
        }
        if(v == '33.18.01'){
            // BaleadiBaturejoCengkalsewuGaduderoKasiyanKedumulyoKedungwinongKuwawurPakemPorang ParingPrawotoSukoliloSumbersokoTompegunungWegilWotan
        }
        if(v == '33.18.03'){
            // Angkatan KidulAngkatan LorKarangawenKarangmulyoKarangwonoKebenKedalinganLaranganMaitanMangunreksoMojomulyoPakisSinomwidodoSitirejoTambahagungTambaharjoTambakromoWukirsari
        }
        if(v == '33.18.19'){
            // Bendokaton KidulBulunganDororejoJepat KidulJepat LorKalikalongKeboromoKedungbangKedungsariLuwangMargomulyoPakisPondowanPundenrejoPurwokertoSambirotoSendangrejoTayukulonTayuwetanTendasTunggulsari
        }
        if(v == '33.18.14'){
            // CabakGunungsariGuwoKlumpitLaharPurwosariRegalohSambirejoSumbermulyoSuwatuTajungsariTamansariTlogorejoTlogosariWonorejo
        }
        if(v == '33.18.21'){
            // AsempapanGuyanganKadilanguKajarKaranglegiKarangwageKertomulyoKetanenKrandanMojoagungPasucenRejoagungSambilawangTegalharjoTlutupTrangkil    
        }
        if(v == '33.18.15'){
            // BangsalrejoBumiayuJatimulyoJetakJontroKepohMargorejoNgurenrejoNgurensitiPagerharjoPanggungroyomSidoharjoSukoharjoSuwadukTawangharjoTlogoharumTluwukWedarijaksa
        }
        if(v == '33.18.04'){
            // BlingijatiBringinwarengBumiharjoDanyangmulyoDeganGodoGunungpantiGuyanganKarangkonangKarangsumberKebolampangKebowanKlecoregonangKropakKudurMintorahayuPadanganPagendisanPekalonganPohgadingPulorejoSarimulyoSerutsadangSugihanSumbermulyoTanggelTawangrejoTlogorejoWinongWirun
        }
        $('#kelurahan').html(listkelurahan);
    }
</script>
@endsection