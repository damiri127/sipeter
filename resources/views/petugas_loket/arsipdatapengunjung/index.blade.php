@extends('petugas_loket.layouts.layout')
@section('content')

    <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <div class="d-inline-flex p-2">
                <h2>Data Pengunjung Puskesmas</h2>
            </div>
            <h1><a href="{{route('add_datapengunjung')}}" class="btn btn-sm btn-primary">Tambah Pengunjung Baru</a></h1>
        </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </thead>
                    <tfoot>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tfoot>
                    <tbody>
                        @foreach ($pengunjung as $item)
                        <tr>
                            <td>{{$item->id_pengunjung}}</td>
                            <td>{{$item->nama_pengunjung}}</td>
                            <td>{{$item->asal_kecamatan}}, {{$item->asal_desa}}, {{$item->alamat_lengkap}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalCenter{{$item->id_pengunjung}}">Info</a>
                                {{-- MODAL INFO --}}
                                <div class="modal fade" id="exampleModalCenter{{$item->id_pengunjung}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h3 class="modal-title" id="exampleModalLongTitle">Data Pengunjung Puskesmas</h3>
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
                                                <td> {{$item->nama_pengunjung}} </td>
                                              </tr>
                                              <tr>
                                                <th scope="col">NIK</th>
                                                <td>:</td>
                                                <td>{{$item->NIK}}</td>
                                              </tr>
                                              <tr>
                                                <th scope="col">Tempat, Tanggal Lahir</th>
                                                <td>:</td>
                                                <td> {{$item->tempat_lahir}}, {{$item->tanggal_lahir}}</td>
                                              </tr>
                                              <tr>
                                                <th scope="col">Alamat Lengkap</th>
                                                <td>:</td>
                                                <td> {{$item->asal_desa}}, {{$item->asal_kecamatan}}, {{$item->alamat_lengkap}} </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <a href="{{route('edit_datapengunjung', ['id_pengunjung'=>$item->id_pengunjung])}}" class="btn btn-primary">Edit Data</a>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <a href="{{route('edit_datapengunjung', ['id_pengunjung'=>$item->id_pengunjung])}}" class="btn btn-sm btn-warning">Edit</a>
                                <a data-href="{{route('delete_datapengunjung', ['id_pengunjung'=>$item->id_pengunjung])}}" id="deleteConfirmation{{$item->id_pengunjung}}" data-name="{{$item->nama_pengunjung}}" class="btn btn-sm btn-danger" href="#">Hapus</a>
                                <script>
                                  $("#deleteConfirmation"+{{$item->id_pengunjung}}).click(function () {
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