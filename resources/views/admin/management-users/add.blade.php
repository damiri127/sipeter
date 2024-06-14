@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Tambah Data Pengguna {{$level->nama_struktur_jabatan}}</h2>
            
        </div>
        <form action="{{route('insert_pengguna', ["id_struktur_jabatan"=>$level->id_struktur_jabatan])}}" method="post" >
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="inpukNama">Nama</label>
                    <input id="inputNama" type="text" name="nama" class="form-control" required placeholder="Masukan Nama Pengguna">
                </div>
                <div class="form-group">
                    <label for="inpukNama">NIP</label>
                    <input id="inputNama" type="text" name="nip" class="form-control" required placeholder="Masukan NIP Pengguna">
                </div>
                <div class="form-group">
                    <label for="inpukNama">Username</label>
                    <input id="inputNama" type="text" name="username" class="form-control" required placeholder="Masukan Username Pengguna">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="#" class="btn btn-danger" id="backConfirmation" data-href="{{route('mengelola_pengguna', ['id_struktur_jabatan'=>$level->id_struktur_jabatan])}}">Kembali</a>
                <script>
                    $("#backConfirmation").click(function () {
                        swal({
                            title: 'Batal Menginputkan Data Pengguna?',
                            text: "Semua perubahan tidak akan disimpan",
                            type: 'warning',
                            buttons:{
                                confirm: {
                                    text: 'Kembali',
                                    className : 'btn btn-danger',
                                },
                                cancel: {
                                    visible: true,
                                    text : 'Lanjutkan Mengisi Data',
                                    className: 'btn btn-success',
                                }
                            }
                            }).then((willConfirm) => {
                            if (willConfirm) {
                                window.location.href = $(this).data('href');
                            }
                        });
                    });
                </script>
            </div>
        </form>
    </div>
@endsection