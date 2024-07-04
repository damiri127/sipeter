@extends('admin.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Data Program {{$sub_kategori_ukm->nama_sub_kategori_ukm}}</h2>
            <a href="{{route('add_program_ukm', ['id_sub_kategori_ukm'=>$sub_kategori_ukm->id_sub_kategori_ukm])}}" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Program</th>
                        <th>Penanggung Jawab</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Program</th>
                        <th>Penanggung Jawab</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($program_ukm as $program)
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td> {{$program->nama_program_ukm}} </td>
                            <td>{{$program->nama}}</td>
                            <td>
                                <a href="{{route('fasilitas_air_bersih')}}" class="btn btn-sm btn-info"><i class="fas fa-info"></i> Info</a>
                                <a href="{{route('edit_program_ukm', ['id_program_ukm'=>$program->id_program_ukm])}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Update</a>
                                <a href="#" data-name="{{$program->nama_program_ukm}}" class="btn btn-sm btn-danger" data-href="{{route('delete_program_ukm', ['id_program_ukm'=>$program->id_program_ukm])}}" id="deleteConfirmation{{$program->id_program_ukm}}"> <i class="fas fa-trash"></i> Hapus</a>
                                {{-- JS DELETE CONFIRMATION --}}
                                <script>
                                    $("#deleteConfirmation"+{{$program->id_program_ukm}}).click(function () {
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