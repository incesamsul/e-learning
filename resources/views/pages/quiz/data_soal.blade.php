@extends('layouts.admin.v_template')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex  justify-content-between">
                        <a href="{{ URL::to('/dosen/' . $pages) }}"><i class="fas fa-arrow-left"></i></a>
                        <h4>Data Soal</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ URL::to('/dosen/create_soal') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="soal">Soal</label>
                                <input type="hidden" class="form-control" name="quiz" value="{{ $id_quiz }}">
                                <input type="text" class="form-control" name="soal">
                            </div>
                            <div class="form-group">
                                <label for="a">Jawaban a</label>
                                <input type="text" class="form-control" name="a">
                            </div>
                            <div class="form-group">
                                <label for="a">Jawaban b</label>
                                <input type="text" class="form-control" name="b">
                            </div>
                            <div class="form-group">
                                <label for="a">Jawaban c</label>
                                <input type="text" class="form-control" name="c">
                            </div>
                            <div class="form-group">
                                <label for="a">Jawaban d</label>
                                <input type="text" class="form-control" name="d">
                            </div>
                            <div class="form-group">
                                <label for="kunci">Kunci</label>
                                <select name="kunci" id="kunci" class="form-control">
                                    <option value="a">a</option>
                                    <option value="b">b</option>
                                    <option value="c">c</option>
                                    <option value="d">d</option>
                                </select>
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
            @foreach ($soal as $row)
                <div class="col-sm-3">
                    <div class="card p-4">
                        <div class="icon text-center">
                            <i class="fas fa-book" style="font-size: 100px"></i>
                        </div>
                        <h4 class="my-3">{{ $row->judul_soal }}</h4>
                        <div class="card-body  p-0">
                            <p> Waktu pengerjaan : {{ $row->waktu_pengerjaan }}</p>
                        </div>
                        <a href="{{ URL::to('/dosen/delete_soal/' . $row->id_soal) }}" onclick="confirm('yakin?')"
                            data-id_soal="{{ $row->id_soal }}" class="btn btn-danger hapus-info"><i
                                class="fas fa-trash"></i>
                            Delete</a>
                        <a href="{{ URL::to('/dosen/soal/' . $row->id_soal) }}" class="btn btn-primary mt-3 hapus-info"><i
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
