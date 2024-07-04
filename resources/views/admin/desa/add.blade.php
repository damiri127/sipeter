@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Tambah Data Desa</h2>
        </div>
        <form action="{{route('store_desa')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_desa">Nama Desa</label>
                    <input type="text" name="nama_desa" id="nama_desa" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="lon">Longitude</label>
                    <input type="number" step="any" name="lon" id="lon" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="lat">Latitude</label>
                    <input type="number" step="any" name="lat" id="lat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="luas_wilayah">Luas Wilayah (km²)</label>
                    <input type="number" step="any" name="luas_wilayah" id="luas_wilayah" class="form-control" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="#" class="btn btn-danger" id="backConfirmation" data-href="{{route('mengelola_desa')}}">Kembali</a>
                <script>
                    $("#backConfirmation").click(function () {
                        swal({
                            title: 'Batal Menginputkan Data?',
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