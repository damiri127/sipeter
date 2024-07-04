@extends('admin.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Data Pemriksaan Fasilitas Air Bersih</h2>
            <a href="{{route('add_fasilitas_air_bersih')}}" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Fasilitas</th>
                        <th>Hasil Pemeriksaan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Fasilitas</th>
                        <th>Hasil Pemeriksaan</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($fasilitas_air as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama_fasilitas}}</td>
                            <td>{{$item->hasil_pemeriksaan}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection