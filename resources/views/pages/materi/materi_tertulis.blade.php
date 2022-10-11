@extends('layouts.admin.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <a href="{{ URL::to('/dosen/' . $pages) }}"><i class="fas fa-arrow-left"></i></a>
                    <h4>Data Materi Tertulis</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ URL::to('/dosen/create_materi_tertulis') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul_materi">Judul</label>
                            <input type="hidden" class="form-control" name="pelajaran" value="{{ $id_pelajaran }}">
                            <input type="text" class="form-control" name="judul_materi">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_materi">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi_materi">
                        </div>
                        <div class="form-group">
                            <label for="materi">Materi <small class="text-secondary">(Hanya bisa pdf)</small></label>
                            <input type="file" class="form-control" name="materi">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($materi as $row)
        <div class="col-sm-6">
            <div class="card p-4">
                <iframe width="560" height="315" src="{{ asset('data/materi_tertulis/' . $row->materi) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4 class="my-3">{{ $row->judul_materi }}</h4>
                <div class="card-body  p-0">
                    <p>{{ $row->judul_materi }}</p>
                </div>
                <a href="{{ URL::to('/dosen/delete_materi_tertulis/' . $row->id_materi_tertulis) }}" onclick="confirm('yakin?')" data-id_materi="{{ $row->id_materi_materi }}" class="btn btn-danger hapus-info"><i
                        class="fas fa-trash"></i>
                    Delete</a>
            </div>
        </div>
        @endforeach
    </div>
</section>


@endsection
@section('script')
<script>
    $(document).ready(function() {






    });

    $('#{{ $liClass }}').addClass('aktif');

</script>
@endsection
