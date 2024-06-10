@extends('admin.layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Jabatan Baru</h2>
        </div>
        <form action="{{ route('store_jabatan') }}" method="POST">
            @csrf
            <div class="card-body" id="form-input">
                <div class="form-group">
                    <label for="inpukNama">Nama</label>
                    <input id="inputNama" type="text" name="nama_struktur_jabatan" class="form-control" required placeholder="Masukan Nama Jabatan baru...">
                </div>
            <div class="card-footer" id="form-button-submit-cancel">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{route('data_struktur_jabatan')}}" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection