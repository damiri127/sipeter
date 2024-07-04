@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Data Wilayah Kerja Puskesmas</h2>
                <a href="{{route('add_desa')}}" class="btn btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Desa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Desa</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($desa as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama_desa}}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalCenter{{$item->id_desa}}"> <i class="fas fa-info"></i> Info</a>
                                    {{-- Modal start --}}
                                    <div class="modal fade" id="exampleModalCenter{{$item->id_desa}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLongTitle">Data Desa {{$item->nama_desa}}</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <table class="table mt-3">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">Luaas Wilayah</th>
                                                        <td>:</td>
                                                        <td>{{ $item->luas_wilayah }} Km</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Longtitude</th>
                                                        <td>:</td>
                                                        <td> {{$item->lon}} </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Latitude</th>
                                                        <td>:</td>
                                                        <td> {{$item->lat}} </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="#" class="btn btn-warning">Edit Data</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    {{-- Modal end --}}
                                    <a href="#" class="btn btn-sm btn-warning"> <i class="fas fa-edit"></i> Update</a>
                                    <a href="#" class="btn btn-sm btn-danger" 
                                    data-href="#" 
                                    data-name="{{$item->nama_desa}}" class="btn btn-sm btn-danger" 
                                    id="deleteConfirmation{{$item->id_desa}}"> 
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                    </a>
                                    {{-- JS DELETE CONFIRMATION --}}
                                    <script>
                                        $("#deleteConfirmation"+{{$item->id_desa}}).click(function () {
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