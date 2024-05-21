@extends('petugas_loket.layouts.layout')
@section('content')
    <div class="container-fluid">

        @if (session("success"))
        <script>
            swal("Berhasil", "{{session('success')}}", {
                icon : "success",
                buttons: {
                    confirm: {
                        className : 'btn btn-success'
                    }
                },
            });
        </script>
        @endif
        
        @if (session('error'))
        <script>
            swal("Gagal!", "{{session('error')}}", {
                icon : "error",
                buttons: {
                    confirm: {
                        className : 'btn btn-danger'
                    }
                },
            });
        </script>
        @endif

        <div class="card" id="card-input-pengunjung">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="d-inline-flex p-2">
                        <h2>Pendaftaran Pasien</h2>
                    </div>
                    <h1><a href="{{route('add_datakunjungan')}}" class="btn btn-sm btn-primary">Tambah Pengunjung Baru</a></h1>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="inpukNIK">NIK Pengunjung Lama</label>
                            <input id="inputNama" type="number" name="name" class="form-control" maxlength="16" required placeholder="16 Digit Angka NIK Pengunjung">
                            <button class="btn btn-primary mt-3" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card" id="card-informasi-pengunjung">
            <div class="card-header">
                <h2>Data Pengunjung</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
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
                                    <a href="#" class="btn btn-sm btn-info">Info</a>
                                    <a href="#" class="btn btn-sm btn-warning">Update</a>
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