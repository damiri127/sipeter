@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Sub Divisi {{$ukm->nama_jenis_ukm}}</h2>
                <a href="{{route('add_subdivisi_ukm', ['id_ukm'=>$ukm->id_ukm])}}" class="btn btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sub Divisi</th>
                            <th>Penanggung Jawab</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Subdivisi</th>
                            <th>Penanggung Jawab</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($sub_ukm as $divisi)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td> {{$divisi->nama_sub_kategori_ukm}} </td>
                                <td> {{$divisi->nama}} </td>
                                <td>
                                    <a href="{{route('mengelola_program_ukm', ['id_sub_kategori_ukm'=>$divisi->id_sub_kategori_ukm])}}" class="btn btn-sm btn-info"><i class="fas fa-info"></i> Info</a>
                                    <a href="{{route('edit_subdivisi_ukm', ['id_sub_kategori_ukm'=>$divisi->id_sub_kategori_ukm])}}" class="btn btn-sm btn-warning"><i class="fas fa-update"></i> Update</a>
                                    <a href="#" class="btn btn-sm btn-danger" id="deleteConfirmation{{$divisi->id_sub_kategori_ukm}}" data-href="{{route("delete_subdivisi_ukm", ["id_sub_kategori_ukm"=>$divisi->id_sub_kategori_ukm])}}" data-name="{{$divisi->nama_sub_kategori_ukm}}"><i class="fas fa-trash" ></i> Hapus</a>
                                    <script>
                                        $("#deleteConfirmation"+{{$divisi->id_sub_kategori_ukm}}).click(function () {
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
@endsection