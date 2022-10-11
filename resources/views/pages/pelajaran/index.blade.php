@extends('layouts.admin.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data pelajaran</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header  mr-3" placeholder="Cari Data  ..." id="searchbox">
                        <button type="button" class="btn bg-main text-white float-right" data-toggle="modal" id="addUserBtn" data-target="#modalPengguna"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-pelajaran table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                                <td>Sampul</td>
                                <td>Kategori pelajaran</td>
                                <td>Nama pelajaran</td>
                                <td>Deskripsi</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelajaran as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('data/gambar_sampul/'.$row->gambar) }}" alt="" class="img-thumbnail" width="100">
                                    </td>
                                    <td>{{ $row->kategori->nama_kategori }}</td>
                                    <td>{{ $row->nama_pelajaran }}</td>
                                    <td>{{ $row->deskripsi }}</td>
                                    <td class="option">
                                        <div class="btn-group dropleft btn-option">
                                            <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </i>
                                            <div class="dropdown-menu">
                                                <a data-detail='@json($row)' data-kategori='@json($row->kategori)' data-path={{ asset('data/gambar_sampul/' . $row->gambar) }} data-toggle="modal" data-target="#modalPreview" class="dropdown-item detail" href="#"><i class="fas fa-info"> Detail</i></a>
                                                <a data-edit='@json($row)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item edit" href="#"><i class="fas fa-pen"> Edit</i></a>
                                                <a data-id="{{ $row->id_pelajaran }}" class="dropdown-item hapus" href="#"><i class="fas fa-trash"> Hapus</i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="modalPengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body" id="main-body">
                <form id="formpelajaran" action="{{ URL::to('/dosen/create_pelajaran') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_pelajaran">Nama pelajaran</label>
                        <input type="hidden" class="form-control" name="id" id="id">
                        <input required type="text" class="form-control" name="nama_pelajaran" id="nama_pelajaran">
                    </div>
                    <div class="form-group">
                        <label for="kategori">kategori</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="">-- kategori --</option>
                            @foreach ($kategori as $row)
                                <option value="{{ $row->id_kategori }}">{{ $row->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi pelajaran</label>
                        <input value="" required type="text" class="form-control" name="deskripsi" id="deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="gambar">gambar</label>
                        <input type="file" class="form-control" name="gambar" id="gambar">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-main text-white" id="modalBtn">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPreview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body" id="previewBody">

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {




        // TOMBOL DETAIL
        $('.table-pelajaran tbody').on('click', 'tr td a.detail', function() {
            let detail = $(this).data('detail');
            let kategori = $(this).data('kategori');
            let path = $(this).data('path');

            let detailHTML = '';
                detailHTML += '<img class="img-thumbnail" src="' + path + '" alt="what"><hr>';
                detailHTML += "nama_pelajaran : " + detail.nama_pelajaran + '<hr>';
                detailHTML += "Kategori : " + kategori.nama_kategori + '<hr>';
                detailHTML += "Deskripsi : " + kategori.deskripsi + '<hr>';
            $('#previewBody').html(detailHTML);
        })

        // TOMBOL EDIT USER
        $('.table-pelajaran tbody').on('click', 'tr td a.edit', function() {
            let edit = $(this).data('edit');
            $('#id').val(edit.id_pelajaran);
            $('#nama_pelajaran').val(edit.nama_pelajaran);
            $('#deskripsi').val(edit.deskripsi);
            $('#kategori').val(edit.id_kategori);
            $('#formpelajaran').attr('action','/dosen/update_pelajaran')
        })

        // TOMBOL TAMBAH USER
        $('#addUserBtn').on('click', function() {
            $('#formpelajaran').attr('action','/dosen/create_pelajaran')
        });

        // TOMBOL HAPUS USER
        $('.table-pelajaran tbody').on('click', 'tr td a.hapus', function() {
            let id = $(this).data('id');
            Swal.fire({
                title: 'Apakah yakin?'
                , text: "Data tidak bisa kembali lagi!"
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Ya, Konfirmasi'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        , url: '/dosen/delete_pelajaran'
                        , method: 'post'
                        , dataType: 'json'
                        , data: {
                            id: id
                        }
                        , success: function(data) {
                            if (data == 1) {
                                Swal.fire('Berhasil', 'Data telah terhapus', 'success').then((result) => {
                                    location.reload();
                                });
                            }
                        }
                    })
                }
            })
        });





    });

    $('#liPelajaran').addClass('aktif');

</script>
@endsection
