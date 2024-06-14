@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Edit Data Pengguna {{$level->nama_struktur_jabatan}}</h2>
        </div>
        <form action="{{route('update_pengguna', ['id'=>$user->id])}}" method="post" >
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="inpukNama">Nama</label>
                    <input id="inputNama" type="text" name="nama" class="form-control" required placeholder="Masukan Nama Pengguna" value="{{$user->nama}}">
                </div>
                <div class="form-group">
                    <label for="inpukNama">NIP</label>
                    <input id="inputNama" type="text" name="nip" class="form-control" required placeholder="Masukan NIP Pengguna" value="{{$user->nip}}">
                </div>
                <div class="form-group">
                    <label for="inpukNama">Username</label>
                    <input id="inputNama" type="text" name="username" class="form-control" required placeholder="Masukan Username Pengguna" value="{{$user->username}}">
                </div>
                <div class="form-group">
                    <label for="inpukNama">Jabatan</label>
                    <select type="text" name="id_struktur_jabatan" class="form-control" required placeholder="Jabatan Pengguna...">
                        <option value="{{$level->id_struktur_jabatan}}">{{$level->nama_struktur_jabatan}}</option>
                        @foreach ($jabatan as $role )
                            @if ($role->id_struktur_jabatan != $level->id_struktur_jabatan)
                            <option value="{{$role->id_struktur_jabatan}}">{{$role->nama_struktur_jabatan}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inpukNama">Password</label>
                    <input id="inputNama" type="password" name="password" class="form-control" required placeholder="Masukan Password Baru Pengguna">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">Perbarui</button>
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