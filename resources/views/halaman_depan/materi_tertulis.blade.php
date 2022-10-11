@extends('layouts.front.frontend')

@section('content')



<!-- end catagory section -->


<!-- catagory section -->

<section class="buku_section layout_padding">
    <div class="catagory_container">
        <div class="container ">
            {{-- <div class="heading_container heading_center">

      </div> --}}
            <div class="row mt-5">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="section-title table-responsive">
                                <h2>{{ $pelajaran->nama_pelajaran }}</h2>

                            </div>
                        </div>
                        {{-- <div class="col-sm-6  d-flex align-items-center justify-content-start"> --}}
                            {{-- <div id="qrcode_user"></div> --}}
                        {{-- </div> --}}
                    </div>
                    <div class="row">
                        @foreach ($materi as $row)
                        <div class="col-sm-9 my-3">
                            <div class="card p-4">
                                <iframe style="width: 100%" width="560" height="315" src="{{ asset('data/materi_tertulis/' . $row->materi) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <h4 class="my-3">{{ $row->judul_materi }}</h4>
                                <div class="card-body  p-0">
                                    <p>{{ $row->judul_materi }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-3">
                    @include('components.menu_materi')
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end catagory section -->


<!-- info section -->

<section class="info_section layout_padding2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 info-col">
                <div class="info_detail">
                    <h4>
                        Tentang kami
                    </h4>
                    <p>
                        e-learning web adalah aplikasi berbasis web yang mempermudah pengelolaan buku dan peminjaman buku pada e-learning
                    </p>
                    <div class="info_social">
                        <a href="">
                            <i class="fab fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fab fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 info-col">
                <div class="info_contact">
                    <h4>
                        Address
                    </h4>
                    <div class="contact_link_box">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                makassar
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                Telp +02345683722
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                e-learning@gmail.com
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 info-col">
                <div class="info_contact">
                    <h4>
                        Email
                    </h4>
                    <form action="#">
                        <input type="text" placeholder="Enter email" />
                        <button type="submit">
                            Kirim
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 info-col">
                <div class="map_container">
                    <div class="map">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end info section -->



@endsection
@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var qrcode = new QRCode("qrcode_user", {
            text: 'es',
            width: 300,
            height: 300,
            colorDark: "#063547",
            colorLight: "#F5F6F9",
            correctLevel: QRCode.CorrectLevel.H
        });

    });






    var loadFile = function(event) {
        var output = document.querySelector('#preview');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
    $('.btn-preview').on('click', function() {
        let path = $(this).data('path');
        $('#iframe-preview').attr('src', path);
    })
</script>
@endsection
