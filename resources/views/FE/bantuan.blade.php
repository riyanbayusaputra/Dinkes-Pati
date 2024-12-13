@extends('FE.layouts.app')

@section('content')
<section id="content">
    <div class="content-wrap py-0">
        <div class="container clearfix mt-4">
            <div class="heading-block center">
                <h2>Frequently Asked Questions ( FAQ )</h2>
                <span>Pertanyaan dan jawaban yang umum ditanyakan menurut kami</span>
            </div>

            <div class="row mb-2">
                <div class="postcontent col-lg-12">

                    <div class="grid-filter-wrap" hidden>
                        <ul class="grid-filter style-4 customjs">

                            <li class="activeFilter"><a href="#" data-filter="all">All</a></li>
                            <li class=""><a href="#" data-filter=".faq-marketplace">Marketplace</a></li>
                            <li class=""><a href="#" data-filter=".faq-authors">Authors</a></li>
                            <li><a href="#" data-filter=".faq-legal">Legal</a></li>
                            <li><a href="#" data-filter=".faq-itemdiscussion">Item Discussion</a></li>
                            <li><a href="#" data-filter=".faq-affiliates">Affiliates</a></li>
                            <li><a href="#" data-filter=".faq-miscellaneous">Miscellaneous</a></li>

                        </ul>
                    </div>

                    <div class="clear"></div>

                    <div id="faqs" class="faqs">
                        @foreach($faqs as $key => $v)
                        <div class="toggle faq faq-marketplace faq-authors" style="">
                            <div class="toggle-header">
                                <div class="toggle-icon">
                                    <i class="toggle-closed icon-question-sign"></i>
                                    <i class="toggle-open icon-question-sign"></i>
                                </div>
                                <div class="toggle-title">
                                    {{$v->question}}
                                </div>
                            </div>
                            <div class="toggle-content p-4" style="display: none;">
                                @foreach($v->answers as $key => $a)
                                <li>{{$a->answer}}</li>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="toggle faq faq-marketplace faq-authors" style="">
                            <div class="toggle-header">
                                <div class="toggle-icon">
                                    <i class="toggle-closed icon-question-sign"></i>
                                    <i class="toggle-open icon-question-sign"></i>
                                </div>
                                <div class="toggle-title">
                                    Apa itu Siriwil ?
                                </div>
                            </div>
                            <div class="toggle-content" style="display: none;">Sistem Informasi Rumpun Insfrastruktur
                                dan Kewilayahan Kabupaten Pati ( Siriwil )</div>
                        </div>

                        <div class="toggle faq faq-authors faq-miscellaneous" style="">
                            <div class="toggle-header">
                                <div class="toggle-icon">
                                    <i class="toggle-closed icon-question-sign"></i>
                                    <i class="toggle-open icon-question-sign"></i>
                                </div>
                                <div class="toggle-title">
                                    Apakah terdapat nomor yang bisa dihubungi ?
                                </div>
                            </div>
                            <div class="toggle-content" style="display: none;">Pengguna dapat menghubungi Siriwil dengan
                                nomor : 0295 381351 atau email : bappeda@patikab.go.id</div>
                        </div>

                        <div class="toggle faq faq-marketplace faq-authors" style="">
                            <div class="toggle-header">
                                <div class="toggle-icon">
                                    <i class="toggle-closed icon-question-sign"></i>
                                    <i class="toggle-open icon-question-sign"></i>
                                </div>
                                <div class="toggle-title">
                                    Apakah ada alamat yang bisa dikunjungi ?
                                </div>
                            </div>
                            <div class="toggle-content" style="display: none;">Bagi masyarakat yang mengetahui alamat
                                Siriwil bisa datang ke alamat : Jalan Raya Pati - Kudus Km. 3,5 Pati Jawa Tengah.</div>
                        </div>

                        <div class="toggle faq faq-petasebaran faq-authors" style="">
                            <div class="toggle-header">
                                <div class="toggle-icon">
                                    <i class="toggle-closed icon-question-sign"></i>
                                    <i class="toggle-open icon-question-sign"></i>
                                </div>
                                <div class="toggle-title">
                                    Bagaimana cara mengakses peta sebaran?
                                </div>
                            </div>
                            <div class="toggle-content" style="display: none;">Arahkan kursor ke menu Layanan lalu klik
                                Peta Sebaran.</div>
                        </div>
                        <div class="toggle faq faq-update faq-authors" style="">
                            <div class="toggle-header">
                                <div class="toggle-icon">
                                    <i class="toggle-closed icon-question-sign"></i>
                                    <i class="toggle-open icon-question-sign"></i>
                                </div>
                                <div class="toggle-title">
                                    Apakah EHRA di-update secara berkala?
                                </div>
                            </div>
                            <div class="toggle-content" style="display: none;">Iya, untuk menjaga data - data penting
                                maka sistem akan selalu terupdate</div>
                        </div> --}}
                    </div>


                </div>
                {{-- <div class="col-lg-6">
                    <iframe width="90%" height="50%"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.4121744803957!2d111.04365!3d-6.7487441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d2538f64a577%3A0xc5900941f4d3b89f!2sDinas%20Kesehatan%20Kabupaten%20Pati!5e0!3m2!1sid!2sid!4v1578581465204!5m2!1sid!2sid"></iframe>
                </div>
                <div class="col-lg-6">
                    <h3 class="text-center">Kritik dan saran</h3>
                    @if (Session::has('info'))
                    <div class="alert alert-info">
                        {{ Session::get('info') }}
                    </div>
                    @endif
                    <form action="/kritikdansaran" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="">Pesan</label>
                                <textarea name="pesan" id="pesan" rows="3" class="form-control" required></textarea>
                            </div>
                        </div>
                        <button class="btn btn-prinary" style="background-color: orange; color: white">Kirim</button>
                    </form>
                </div> --}}
            </div>
            <br>
            <br>
        </div>
    </div>
</section>

@endsection