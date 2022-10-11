@extends('layouts.admin.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <a href="{{ URL::to('/dosen/' . $pages) }}"><i class="fas fa-arrow-left"></i></a>
                    <h4>Data Materi</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ URL::to('/dosen/create_materi_video') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul_video">Judul</label>
                            <input type="hidden" class="form-control" name="pelajaran" value="{{ $id_pelajaran }}">
                            <input type="text" class="form-control" name="judul_video">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_video">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi_video">
                        </div>
                        <div class="form-group">
                            <label for="video">Video <small class="text-secondary">(URL youtube)</small></label>
                            <input type="text" class="form-control" name="video">
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
        @foreach ($video as $row)
        <div class="col-sm-6">
            <div class="card p-4">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ getYoutubeId($row->video) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4 class="my-3">{{ $row->judul_video }}</h4>
                <div class="card-body  p-0">
                    <p>{{ $row->judul_video }}</p>
                </div>
                <a href="{{ URL::to('/dosen/delete_materi_video/' . $row->id_materi_video) }}" onclick="confirm('yakin?')" data-id_video="{{ $row->id_materi_video }}" class="btn btn-danger hapus-info"><i
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
