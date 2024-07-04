@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Data Unit Kesehatan Masyarakat</h2>
                <a href="{{route('tambah_ukm')}}" class="btn btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama UKM</th>
                            <th>Penanggung Jawab</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama UKM</th>
                            <th>Penanggung Jawab</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($ukm as $item)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$item->nama_jenis_ukm}} </td>
                                <td> {{$item->nama}} </td>
                                <td>
                                    <a href="{{route('mengelola_subdivisi_ukm', ['id_ukm'=>$item->id_ukm])}}" class="btn btn-sm btn-info"><i class="fas fa-info"></i> Info</a>
                                    <a href="{{route('edit_ukm', ['id_ukm'=>$item->id_ukm])}}" class="btn btn-sm btn-warning"> <i class="fas fa-edit"></i> Update</a>
                                    {{-- <a href="#"  data-href="{{route('delete_ukm', ['id_ukm'=>$item->id_ukm])}}" id="deleteConfirmation{{$item->id_ukm}}" data-name="{{$item->nama_jenis_ukm}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a> --}}
                                    <script>
                                        $("#deleteConfirmation"+{{$item->id_ukm}}).click(function () {
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