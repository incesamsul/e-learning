@extends('layouts.admin.v_template')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex  justify-content-between">
                        <a href="{{ URL::to('/dosen/' . $pages) }}"><i class="fas fa-arrow-left"></i></a>
                        <h4>Data Quiz</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ URL::to('/dosen/create_quiz') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="hidden" class="form-control" name="pelajaran" value="{{ $id_pelajaran }}">
                                <input type="text" class="form-control" name="judul">
                            </div>
                            <div class="form-group">
                                <label for="waktu_pengerjaan">Waktu Pengerjaan</label>
                                <input type="time" class="form-control" name="waktu_pengerjaan">
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
            @foreach ($quiz as $row)
                <div class="col-sm-3">
                    <div class="card p-4">
                        <div class="icon text-center">
                            <i class="fas fa-book" style="font-size: 100px"></i>
                        </div>
                        <h4 class="my-3">{{ $row->judul_quiz }}</h4>
                        <div class="card-body  p-0">
                            <p> Waktu pengerjaan : {{ $row->waktu_pengerjaan }}</p>
                        </div>
                        <a href="{{ URL::to('/dosen/delete_quiz/' . $row->id_quiz) }}" onclick="confirm('yakin?')"
                            data-id_quiz="{{ $row->id_quiz }}" class="btn btn-danger hapus-info"><i
                                class="fas fa-trash"></i>
                            Delete</a>
                        <a href="{{ URL::to('/dosen/soal/' . $row->id_quiz) }}" class="btn btn-primary mt-3 hapus-info"><i
                                class="fas fa-trash"></i>
                            Soal</a>
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
