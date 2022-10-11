@extends('layouts.admin.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <a href="{{ URL::to('/dosen/peserta') }}"><i class="fas fa-arrow-left"></i></a>
                    <h4>Data Peserta</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-pelajaran table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                                <td>Nama peserta</td>
                                <td>Status</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelajaran as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->user->name }}</td>
                                    <td>
                                        @if ($row->status == 'pending')
                                            <span class="badge badge-secondary">Pending</span>
                                            @elseif($row->status == 'ditolak')
                                            <span class="badge badge-danger">Ditolak</span>
                                            @elseif($row->status == 'diterima')
                                            <span class="badge badge-success">Diterima</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->status != 'pending')
                                        <a href="{{ URL::to('/dosen/batalkan_peserta/' . $row->id_peserta_pelajaran) }}" class="btn btn-light">Batal</a>
                                        @else
                                        <a href="{{ URL::to('/dosen/terima_peserta/' . $row->id_peserta_pelajaran) }}" class="btn btn-primary">Terima</a>
                                        <a href="{{ URL::to('/dosen/tolak_peserta/' . $row->id_peserta_pelajaran) }}" class="btn btn-danger">Tolak</a>
                                        @endif
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


@endsection
@section('script')
<script>
    $(document).ready(function() {






    });

    $('#liPeserta').addClass('aktif');

</script>
@endsection
