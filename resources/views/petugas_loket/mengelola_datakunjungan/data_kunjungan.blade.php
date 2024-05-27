@extends('petugas_loket.layouts.layout')
@section('content')
    <div class="container-fluid">
        
        {{-- Card Input Pengunjung Lama --}}
        <div class="card" id="card-input-pengunjung-lama">
            {{-- Button Add Pengunjung Baru --}}
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="d-inline-flex p-2">
                        <h2>Pendaftaran Pasien</h2>
                    </div>
                    <h1><a href="{{route('add_datakunjungan')}}" class="btn btn-sm btn-primary">Tambah Pengunjung Baru</a></h1>
                </div>
            </div>
            {{-- Form Input Validation Pengunjung Lama --}}
            <div class="card-body">
                <div class="container">
                    <form action="{{route('validation_pengunjunglama')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="inpukNIK">NIK Pengunjung Lama</label>
                            <input id="inputNama" type="number" name="NIK" class="form-control" maxlength="16" required placeholder="16 Digit Angka NIK Pengunjung">
                            <button class="btn btn-primary mt-3" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        {{-- Card List Data Kunjungan Puskesmas --}}
        <div class="card" id="card-informasi-kunjungan">
            <div class="card-header">
                <h2>Data Pengunjung</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display table table-striped table-hover" id="basic-datatables">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu Kunjungan</th>
                                <th>Nama</th>
                                <th>Kunjungan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Waktu Kunjungan</th>
                                <th>Nama</th>
                                <th>Kunjungan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pengunjung as $item )
                            <tr>
                                <td>{{$item->id_kunjungan}}</td>
                                <td>{{$item->tanggal_kunjungan}}</td>
                                <td>{{$item->data_pengunjung->nama_pengunjung}}</td>
                                <td>{{$item->tujuan_kunjungan}}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalCenter{{$item->id_kunjungan}}">Info</a>
                                    {{-- MODAL INFO --}}
                                    <div class="modal fade" id="exampleModalCenter{{$item->id_kunjungan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLongTitle">Data Kunjungan Puskesmas</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <table class="table mt-3">
                                                <tbody>
                                                <tr>
                                                    <th scope="col">Nama</th>
                                                    <td>:</td>
                                                    <td> {{$item->data_pengunjung->nama_pengunjung}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Tanggal Kunjungan</th>
                                                    <td>:</td>
                                                    <td>{{$item->tanggal_kunjungan}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Tujuan Kunjungan</th>
                                                    <td>:</td>
                                                    <td> {{$item->tujuan_kunjungan}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Status Penanganan</th>
                                                    <td>:</td>
                                                    <td> {{$item->status_penanganan}} </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="/petugas_loket/datakunjungan/editDataKunjungan/{{$item->id_kunjungan}}" class="btn btn-primary">Edit Data</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <a href="/petugas_loket/datakunjungan/editDataKunjungan/{{$item->id_kunjungan}}" class="btn btn-sm btn-warning">Update</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-href="/petugas_loket/datakunjungan/hapusKunjungan/{{$item->id_kunjungan}}" id="deleteConfirmation{{$item->id_kunjungan}}" data-name="{{$item->data_pengunjung->nama_pengunjung}}">Hapus</a>
                                    {{-- JS Delete Data Confirmation Alert --}}
                                    <script>
                                        $("#deleteConfirmation"+{{$item->id_kunjungan}}).click(function () {
                                            swal({
                                                title: 'Apakah Anda Ingin Menghapus Data Ini?',
                                                text: "Data "+$(this).data('name')+" Akan Dihapus",
                                                type: 'warning',
                                                buttons:{
                                                    confirm: {
                                                        text: 'Hapus Data',
                                                        className : 'btn btn-success',
                                                    },
                                                    cancel: {
                                                        visible: true,
                                                        text : 'Batalkan',
                                                        className: 'btn btn-danger',
                                                    }
                                                }
                                            }).then((willConfirm) => {
                                                if (willConfirm) {
                                                    window.location.href = $(this).data('href');
                                                } 
                                            });
                                        });
                                    </script>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection