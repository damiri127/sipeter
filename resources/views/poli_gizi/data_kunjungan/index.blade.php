@extends('poli_gizi.layouts.layout')
@section('content')
    {{-- Card List Data Kunjungan Puskesmas --}}
    <div class="card" id="card-informasi-kunjungan">
        <div class="card-header">
            <h2>Data Pasien Belum Ditangani</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-striped table-hover" id="basic-datatables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($kunjungan_belumditangani as $item)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$item->data_pengunjung->nama_pengunjung}}</td>
                                <td>
                                    <a href="{{route('add_rekammedispoligizi', ['id_kunjungan'=>$item->id_kunjungan])}}" class="btn btn-sm btn-primary">Tangani</a>
                                    <a href="#" data-href="{{route('delete_kunjunganpasien', ['id_kunjungan'=>$item->id_kunjungan])}}" data-name="{{$item->data_pengunjung->nama_pengunjung}}" class="btn btn-sm btn-danger" id="deleteConfirmation{{$item->id_kunjungan}}">Hapus</a>
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

    {{-- Data Informasi Kunjungan yang sudah ditangani --}}
    <div class="card" id="informasi-riwayat-kunjungan pasien">
        <div class="card-header">
            <h2>Data Pasien yang Sudah Ditangani</h2>
        </div>
        <div class="card-body">
            <div class="table-responsives">
                <table class="display table table-striped table-hover" id="basic-datatables1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Penanganan</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Penanganan</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($pasiens as $pasien)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td> {{$pasien->tanggal_kunjungan}} </td>
                            <td> {{$pasien->nama_pengunjung}} </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalCenter{{$pasien->id_rekam_medis_poligizi}}">Info</a>
                                {{-- MODAL INFO --}}
                                <div class="modal fade" id="exampleModalCenter{{$pasien->id_rekam_medis_poligizi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLongTitle">Data Pasien Poli Gizi yang Sudah Ditangani</h3>
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
                                                <td>{{$pasien->nama_pengunjung}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Umur</th>
                                                <td>:</td>
                                                <td> {{Carbon\Carbon::parse($pasien->tanggal_lahir)->age}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Tanggal Ditangani</th>
                                                <td>:</td>
                                                <td>{{$pasien->tanggal_kunjungan}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Diagnosis 1</th>
                                                <td>:</td>
                                                <td> {{$pasien->diagnosis1_nama}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Diagnosis 2</th>
                                                <td>:</td>
                                                <td> {{$pasien->diagnosis2_nama}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Status Rujukan </th>
                                                <td>:</td>
                                                <td> {{$pasien->status_rujukan}} </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{route('edit_rekammedis', ['id_rekam_medis_poligizi'=>$pasien->id_rekam_medis_poligizi])}}" class="btn btn-primary">Edit Data</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <a href="{{route('edit_rekammedis',['id_rekam_medis_poligizi'=>$pasien->id_rekam_medis_poligizi])}}" class="btn btn-sm btn-warning">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection