@extends('layouts.app')

@section('main')
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex align-items-center">
                        <h4 class="text-primary mb-0">
                            <i class="fas fa-file-alt mr-2"></i>
                            Detail Jawaban Responden
                        </h4>
                      
                    </div>
                </div>
                
                <div class="card-body">
                    <!-- Header Info -->
                    <div class="alert alert-light border-left border-primary rounded-lg mb-4" style="border-left-width: 4px !important;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="font-weight-bold mb-1">Responden: {{ $response->nama_responden ?? 'Anonymous' }}</h6>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    Tanggal Pengisian: {{ $response->created_at->format('d M Y H:i') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-primary px-3 py-2">No. Kuesioner: {{ $response->nokuesioner }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <!-- Info Lokasi -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-primary mb-3">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        Informasi Lokasi
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-borderless">
                                            <tr>
                                                <td style="width: 140px;">Propinsi</td>
                                                <td>: {{ $response->propinsi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kabupaten</td>
                                                <td>: {{ $response->kabupaten }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kecamatan</td>
                                                <td>: {{ $response->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kelurahan</td>
                                                <td>: {{ $response->kelurahan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Strata Kelurahan</td>
                                                <td>: {{ $response->stratakelurahan }}</td>
                                            </tr>
                                            <tr>
                                                <td>RT/RW</td>
                                                <td>: {{ $response->rtrw }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Info Survei -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-primary mb-3">
                                        <i class="fas fa-clipboard-list mr-2"></i>
                                        Informasi Survei
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-borderless">
                                            <tr>
                                                <td style="width: 140px;">No. Urut</td>
                                                <td>: {{ $response->nourutresponden }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Survei</td>
                                                <td>: {{ $response->tanggal_survei }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jam Mulai</td>
                                                <td>: {{ $response->jam_mulai_wawancara }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jam Selesai</td>
                                                <td>: {{ $response->jam_selesai_wawancara }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <!-- Info Petugas -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-primary mb-3">
                                        <i class="fas fa-user-tie mr-2"></i>
                                        Informasi Petugas
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-borderless">
                                            <tr>
                                                <td style="width: 140px;">Pewawancara</td>
                                                <td>: {{ $response->nama_wawancara }}</td>
                                            </tr>
                                            <tr>
                                                <td>Supervisor</td>
                                                <td>: {{ $response->nama_supervisor }}</td>
                                            </tr>
                                            <tr>
                                                <td>Koordinator</td>
                                                <td>: {{ $response->nama_koordinator_kecamatan }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Info Responden -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-primary mb-3">
                                        <i class="fas fa-users mr-2"></i>
                                        Informasi Rumah Tangga
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-borderless">
                                            <tr>
                                                <td style="width: 140px;">Kepala RT</td>
                                                <td>: {{ $response->nama_kepala_rumah_tangga }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Keluarga</td>
                                                <td>: {{ $response->jumlah_keluarga_rumah_tangga }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jiwa Laki-laki</td>
                                                <td>: {{ $response->jumlah_jiwa_laki_laki }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jiwa Perempuan</td>
                                                <td>: {{ $response->jumlah_jiwa_perempuan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Hubungan</td>
                                                <td>: {{ $response->hubungan_dengan_kepala_rumah_tangga }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat/Telepon</td>
                                                <td>: {{ $response->alamat_telepon }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Jawaban -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="text-primary mb-3">
                                <i class="fas fa-list-alt mr-2"></i>
                                Daftar Jawaban
                            </h6>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="width: 50px;" class="text-center">No</th>
                                            <th>Pertanyaan</th>
                                            <th style="width: 40%;">Jawaban</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($response->answers as $index => $answer)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td>{{ $answer->question->question_text }}</td>
                                                <td>{{ $answer->answer }}</td>
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
    </div>
</div>
@endsection