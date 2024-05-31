@extends('petugas_loket.layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Registrasi Pengunjung Baru</h2>
            </div>
            <form action="{{route('update_datapengunjung', ['id_pengunjung'=>$pengunjung->id_pengunjung])}}" method="POST">
                @csrf
                <div class="card-body" id="form-input">
                    {{-- DATA PENGUNJUNG --}}
                    <div class="data-pasien">
                        <div class="form-group" id="NIK">
                            <label for="inpukNIK">Nomor NIK </label>
                            <input id="inputNama" type="number" name="NIK" class="form-control" maxlength="16" required placeholder="16 Digit Angka NIK" value="{{$pengunjung->NIK}}" disabled>
                        </div>
                        <div class="form-group" id="nama_pengunjung">
                            <label for="inpukNama">Nama</label>
                            <input id="inputNama" type="text" name="nama_pengunjung" class="form-control" required placeholder="Masukan Nama sesuai Kartu Identitas" value="{{$pengunjung->nama_pengunjung}}" disabled>
                        </div>
                        <div class="form-group" id="nomor_telepon">
                            <label for="inputKecamatanWali">Nomor Telepon</label>
                            <input id="inputKecamatanWali" type="text" name="nomor_telepon" maxlength="13" class="form-control" required placeholder="Asal Kecamatan Wali Sesuai kartu Identitas" value="{{$pengunjung->nomor_telepon}}">
                        </div>
                        <div class="form-group" id="jenis_kelamin">
                            <label for="inputJeniKelamin">Jenis Kelamin</label>
                            <select id="inputJenisKelamin" type="text" name="jenis_kelamin" class="form-control" required placeholder="Jenis Kelamin" disabled>
                                <option value="{{$pengunjung->jenis_kelamin}}">{{$pengunjung->jenis_kelamin}}</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group" id="tanggal_lahir">
                            <label for="inputTanggalLahir">Tanggal Lahir</label>
                            <input id="inputTanggalLahir" type="date" name="tanggal_lahir" class="form-control" required placeholder="Tanggal Lahir Pengunjung Sesuai kartu Identitas" disabled value="{{$pengunjung->tanggal_lahir}}">
                        </div>
                        <div class="form-group" id="tempat_lahir">
                            <label for="inputTempatLahir">Tempat Lahir</label>
                            <input id="inputTempatLahir" type="text" name="tempat_lahir" class="form-control" required placeholder="Tempat Lahir Pengunjung Sesuai kartu Identitas" disabled value="{{$pengunjung->tempat_lahir}}">
                        </div>
                        <div class="form-group" id="asal_kecamatan">
                            <label for="inputKecamatan">Asal Kecamatan</label>
                            <input id="inputKecamatan" type="text" name="asal_kecamatan" class="form-control" required placeholder="Asal Kecamatan Pengunjung Sesuai kartu Identitas" value="{{$pengunjung->asal_kecamatan}}">
                        </div>
                        <div class="form-group" id="asal_desa">
                            <label for="inputDesa">Asal Desa</label>
                            <input id="inputDesa" type="text" name="asal_desa" class="form-control" required placeholder="Asal Desa Pengunjung Sesuai kartu Identitas" value="{{$pengunjung->asal_desa}}">
                        </div>
                        <div class="form-group" id="alamat_lengkap">
                            <label for="inputAlamatLengkap">Alamat Lengkap</label>
                            <input id="inputAlamatLengkap" type="text" name="alamat_lengkap" class="form-control" required placeholder="Alamat Lengkap Pengunjung Sesuai kartu Identitas" value="{{$pengunjung->alamat_lengkap}}">
                        </div>
                        <div class="form-group" id="status_menikah">
                            <label for="selectStatusPernikahan">Status Pernikahan</label>
                            <select id="selectStatusPernikahan" name="status_menikah" class="form-control" required placeholder="Status Pernikahan Pengunjung Sesuai kartu Identitas">
                                <option value="{{$pengunjung->status_menikah}}">{{$pengunjung->status_menikah}}</option>
                                <option value="Sudah Menikah">Sudah Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                            </select>
                        </div>
                    </div>
                    {{-- DATA WALI PENGUNJUNG --}}
                    <div class="data-wali">
                        <div class="form-group" id="nama_wali">
                            <label for="inputNamaWali">Nama Wali</label>
                            <input id="inputNamaWali" type="text" name="nama_wali" class="form-control" required placeholder="Nama Wali Sesuai kartu Identitas" value="{{$pengunjung->nama_wali}}">
                        </div>
                        <div class="form-group" id="nomor_teleponwali">
                            <label for="inputKecamatanWali">Nomor Telepon Wali</label>
                            <input id="inputKecamatanWali" type="text" name="nomor_teleponwali" maxlength="13" class="form-control" required placeholder="Nomor Telepon Wali Yang Bisa Dihubungi" value="{{$pengunjung->nomor_teleponwali}}">
                        </div>
                        <div class="form-group" id="asal_kecamatanwali">
                            <label for="inputKecamatanWali">Asal Kecamatan Wali</label>
                            <input id="inputKecamatanWali" type="text" name="asal_kecamatanwali" class="form-control" required placeholder="Asal Kecamatan Wali Sesuai kartu Identitas" value="{{$pengunjung->asal_kecamatanwali}}">
                        </div>
                        <div class="form-group" id="asal_desawali">
                            <label for="inputDesaWali">Asal Desa Wali</label>
                            <input id="inputDesaWali" type="text" name="asal_desawali" class="form-control" required placeholder="Asal Desa Wali Sesuai kartu Identitas" value="{{$pengunjung->asal_desawali}}">
                        </div>
                        <div class="form-group" id="alamat_lengkapwali">
                            <label for="inputAlamatLengkapWali">Alamat Lengkap Wali</label>
                            <input id="inputAlamatLengkapWali" type="text" name="alamat_lengkapwali" class="form-control" required placeholder="Alamat Lengkap Wali Sesuai kartu Identitas" value="{{$pengunjung->alamat_lengkapwali}}">
                        </div>
                    </div>
                </div>
                <div class="card-footer" id="form-button-submit-cancel">
                    <button type="submit" class="btn btn-success">Perbarui</button>
                    <a data-href="{{route('index_arsippengunjung')}}" href="#" class="btn btn-danger" id="backConfirmation">Kembali</a>
                    <script>
                        $("#backConfirmation").click(function () {
                            swal({
                                title: 'Batal Mengedit Data Pengunjung?',
                                text: "Semua Inputan Akan Hilang Jika Anda Kembali",
                                type: 'warning',
                                buttons:{
                                    confirm: {
                                        text: 'Kembali',
                                        className : 'btn btn-danger',
                                    },
                                    cancel: {
                                        visible: true,
                                        text : 'Lanjutkan Mengedit Data',
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
    </div>
@endsection