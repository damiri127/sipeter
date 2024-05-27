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
                                <th>Waktu Penanganan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Waktu Kunjungan</th>
                                <th>Nama Pasien</th>
                                <th>Waktu Penanganan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection