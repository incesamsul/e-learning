@extends('layouts.admin.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Pelajaran</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if (count($pelajaran) > 0)
        @foreach ($pelajaran as $row)
        <div class="col-sm-4">
            <a href="{{ URL::to('/dosen/peserta/' . $row->pelajaran->id_pelajaran) }}" class="text-secondary">
                <div class="card books-card d-flex flex-column  border-0 soft-shadow">
                    <img class="card-image" src="{{ asset('data/gambar_sampul/' . $row->pelajaran->gambar) }}" alt="pelajaran">
                    <div class="books-capt p-4 d-flex flex-column">
                        <strong class="mb-3">{{ $row->pelajaran->nama_pelajaran }}</strong>
                        <p>{{ $row->pelajaran->deskripsi }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @else
            <div class="col-sm-6 offset-sm-3 mt-4 text-center">
                <img src="{{ asset('bostorek/images/empty.svg') }}" alt="" width="300">
                <p>Mohon maaf pelajaran yang anda cari tidak tersedia</p>
            </div>
        @endif
      </div>
</section>


@endsection
@section('script')
<script>
    $(document).ready(function() {






    });

    $('#liPeserta').addClass('aktif');

</script>
@endsection
