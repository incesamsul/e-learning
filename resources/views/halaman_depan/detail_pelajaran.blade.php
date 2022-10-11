@extends('layouts.front.frontend')

@section('content')



<!-- end catagory section -->


<!-- catagory section -->

<section class="pelajaran_section layout_padding">
  <div class="catagory_container">
    <div class="container ">
      {{-- <div class="heading_container heading_center">

      </div> --}}
      <div class="row mt-5">
        <div class="col-sm-5">
            <img src="{{ asset('data/gambar_sampul/' . $pelajaran->gambar) }}" alt="" width="400">
        </div>
        <div class="col-sm-7">
            <h4>{{ $pelajaran->nama_pelajaran }}</h4>
            <p><small>tgl dibuat : {{ $pelajaran->created_at }}</small></p>
            <h5>Deskripsi</h5>
            <p>{{ $pelajaran->deskripsi }}</p>
            @if ($sudah_daftar)
                <span class="badge badge-info">Anda sudah mendaftar pada pelajaran ini</span>
                @else
                <div class="form">
                    <form action="{{ URL::to('/daftar_ke_pelajaran') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                 <button type="submit" class="btn bg-main text-white">Daftar</button>
                            </div>
                            <div class="col-sm-4">
                                <input type="hidden" name="pelajaran" value="{{ $pelajaran->id_pelajaran }}">
                            </div>
                        </div>
                    </form>
                </div>
            @endif
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
            e-learning web adalah aplikasi berbasis web yang mempermudah pengelolaan pelajaran dan peminjaman pelajaran pada e-learning
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
