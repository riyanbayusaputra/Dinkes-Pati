@extends('FE.layouts.app')

@section('content')
<section id="content">
    <div class="content-wrap py-0">
        <div class="container clearfix mt-4">
            <!-- <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.4121744803957!2d111.04365!3d-6.7487441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d2538f64a577%3A0xc5900941f4d3b89f!2sDinas%20Kesehatan%20Kabupaten%20Pati!5e0!3m2!1sid!2sid!4v1578581465204!5m2!1sid!2sid"></iframe> -->

            <div class="row mb-2">
                <div class="col-lg-6">
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
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>
</section>

@endsection