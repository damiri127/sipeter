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
                                            <a href="#" class="btn btn-sm btn-danger">Hapus Pasien</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection