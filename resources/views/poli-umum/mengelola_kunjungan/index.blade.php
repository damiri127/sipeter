@extends('poli-umum.layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="card" id="card-informasi-pengunjung">
            <div class="card-header">
                <h2>Data Pengunjung Yang Belum Ditangani</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu Kunjungan</th>
                                <th>Nama Pasien</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Waktu Kunjungan</th>
                                <th>Nama Pasien</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($penanganan as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->tanggal_kunjungan }}</td>
                                    <td>{{ $data->nama_pengunjung }}</td>
                                    <td>
                                        <a href="/poliumum/datakunjungan/update/{{ $data->id_kunjungan }}" class="btn btn-sm btn-primary">Tangani Pasien</a>
                                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card" id="card-informasi-pengunjung">
            <div class="card-header">
                <h2>Data Pengunjung Yang Sudah Ditangani</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu Kunjungan</th>
                                <th>Nama Pasien</th>
                                {{-- <th>Waktu Penanganan</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Waktu Kunjungan</th>
                                <th>Nama Pasien</th>
                                {{-- <th>Waktu Penanganan</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pengunjung as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tanggal_kunjungan }}</td>
                                    <td>{{ $item->nama_pengunjung }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalCenter{{ $item->id_kunjungan }}">Info</a>
                                        {{-- Modal --}}
                                        <div class="modal fade" id="exampleModalCenter{{ $item->id_kunjungan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                                    <td>{{ $item->nama_pengunjung }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="col">Tanggal Kunjungan</th>
                                                                    <td>:</td>
                                                                    <td>{{ $item->tanggal_kunjungan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="col">Waktu Penanganan</th>
                                                                    <td>:</td>
                                                                    <td>Kapan aja</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="col">Rujukan</th>
                                                                    <td>:</td>
                                                                    <td>Kemana aja</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
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