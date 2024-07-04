@extends('admin.layouts.admin')
@section('content')

<form action="{{route('store_fasilitas_air_bersih')}}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            <h2>Identitas Fasilitas</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nama_fasilitas">Nama Fasilitas</label>
                <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat_fasilitas">Alamat Fasilitas</label>
                <input type="text" name="alamat_fasilitas" id="alamat_fasilitas" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Pemeriksaan Fisik Air</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="keruh_pemeriksaan">Air Keruh</label>
                <select name="keruh_pemeriksaan" id="keruh_pemeriksaan" class="form-control" required>
                    <option value=0>Tidak</option>
                    <option value=1>Ya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bau_pemeriksaan">Air Berbau</label>
                <select name="bau_pemeriksaan" id="bau_pemeriksaan" class="form-control" required>
                    <option value=0>Tidak</option>
                    <option value=1>Ya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rasa_pemeriksaan">Air Berasa</label>
                <select name="rasa_pemeriksaan" id="rasa_pemeriksaan" class="form-control" required>
                    <option value=0>Tidak</option>
                    <option value=1>Ya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="warna_pemeriksaan">Air Berwarna</label>
                <select name="warna_pemeriksaan" id="warna_pemeriksaan" class="form-control" required>
                    <option value=0>Tidak</option>
                    <option value=1>Ya</option>
                </select>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Pemeriksaan Lanjutan</h2>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label for="jamban_pemeriksaan">Ada Jamban Radius 10m dari sumur? </label>
                <select name="jamban_pemeriksaan" id="jamban_pemeriksaan" class="form-control" required>
                    <option value=0>Tidak</option>
                    <option value=1>Ya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tinggi_jamban_pemeriksaan">Jamban Terdekat Lebih Tinggi Dari Sumur? </label>
                <select name="tinggi_jamban_pemeriksaan" id="tinggi_jamban_pemeriksaan" class="form-control" required>
                    <option value=0>Tidak</option>
                    <option value=1>Ya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pembuangan_air_pemeriksaan">Apa pembuangan airnya buruk? </label>
                <select name="pembuangan_air_pemeriksaan" id="pembuangan_air_pemeriksaan" class="form-control" required>
                    <option value=0>Tidak</option>
                    <option value=1>Ya</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
        <a href="#" class="btn btn-danger" id="backConfirmation" data-href="{{ route('fasilitas_air_bersih') }}">Kembali</a>
        <script>
            $("#backConfirmation").click(function () {
                swal({
                    title: 'Batal Menginputkan Data?',
                    text: "Semua perubahan tidak akan disimpan",
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Kembali',
                            className: 'btn btn-danger',
                        },
                        cancel: {
                            visible: true,
                            text: 'Lanjutkan Mengisi Data',
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
    </div>
</form>
    
@endsection