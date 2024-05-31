@extends('petugas_loket.layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Registrasi Pasien Baru</h2>
            </div>
            <form action="{{route('insert_datakunjungan')}}" method="POST">
                @csrf
                <div class="card-body" id="form-input">
                    <div class="form-group">
                        <label for="inpukNIK">Nomor NIK </label>
                        <input id="inputNama" type="number" name="NIK" class="form-control" maxlength="16" required placeholder="16 Digit Angka NIK" value="{{request('NIK')}}">
                    </div>
                    <div class="form-group">
                        <label for="inpukNama">Nama</label>
                        <input id="inputNama" type="text" name="nama_pengunjung" class="form-control" required placeholder="Masukan Nama sesuai Kartu Identitas">
                    </div>
                    <div class="form-group">
                        <label for="inputKecamatanWali">Nomor Telepon</label>
                        <input id="inputKecamatanWali" type="text" name="nomor_telepon" maxlength="13" class="form-control" required placeholder="Asal Kecamatan Wali Sesuai kartu Identitas">
                    </div>
                    <div class="form-group">
                        <label for="inputJeniKelamin">Jenis Kelamin</label>
                        <select id="inputJenisKelamin" type="text" name="jenis_kelamin" class="form-control" required placeholder="Asal Kecamatan Pasien Sesuai kartu Identitas">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputTanggalLahir">Tanggal Lahir</label>
                        <input id="inputTanggalLahir" type="date" name="tanggal_lahir" class="form-control" required placeholder="Tanggal Lahir Pasien Sesuai kartu Identitas">
                    </div>
                    <div class="form-group">
                        <label for="inputTempatLahir">Tempat Lahir</label>
                        <input id="inputTempatLahir" type="text" name="tempat_lahir" class="form-control" required placeholder="Tempat Lahir Pasien Sesuai kartu Identitas">
                    </div>
                    <div class="form-group">
                        <label for="inputKecamatan">Asal Kecamatan</label>
                        <input id="inputKecamatan" type="text" name="asal_kecamatan" class="form-control" required placeholder="Asal Kecamatan Pasien Sesuai kartu Identitas">
                    </div>
                    <div class="form-group">
                        <label for="inputDesa">Asal Desa</label>
                        <input id="inputDesa" type="text" name="asal_desa" class="form-control" required placeholder="Asal Desa Pasien Sesuai kartu Identitas">
                    </div>
                    <div class="form-group">
                        <label for="inputAlamatLengkap">Alamat Lengkap</label>
                        <input id="inputAlamatLengkap" type="text" name="alamat_lengkap" class="form-control" required placeholder="Alamat Lengkap Pasien Sesuai kartu Identitas">
                    </div>
                    <div class="form-group">
                        <label for="selectStatusPernikahan">Status Pernikahan</label>
                        <select id="selectStatusPernikahan" name="status_menikah" class="form-control" required placeholder="Asal Kecamatan Pasien Sesuai kartu Identitas">
                            <option value="Sudah Menikah">Sudah Menikah</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                    </div>
                    {{-- DATA WALI PASIEN --}}
                    <div class="form-group">
                        <label for="inputNamaWali">Nama Wali</label>
                        <input id="inputNamaWali" type="text" name="nama_wali" class="form-control" required placeholder="Asal Kecamatan Wali Sesuai kartu Identitas">
                    </div>
                    <div class="form-group">
                        <label for="inputKecamatanWali">Nomor Telepon Wali</label>
                        <input id="inputKecamatanWali" type="text" name="nomor_teleponwali" maxlength="13" class="form-control" required placeholder="Asal Kecamatan Wali Sesuai kartu Identitas">
                    </div>
                    <div class="form-group">
                        <label for="inputKecamatanWali">Asal Kecamatan Wali</label>
                        <input id="inputKecamatanWali" type="text" name="asal_kecamatanwali" class="form-control" required placeholder="Asal Kecamatan Wali Sesuai kartu Identitas">
                    </div>
                    <div class="form-group">
                        <label for="inputDesaWali">Asal Desa Wali</label>
                        <input id="inputDesaWali" type="text" name="asal_desawali" class="form-control" required placeholder="Asal Desa Wali Sesuai kartu Identitas">
                    </div>
                    <div class="form-group">
                        <label for="inputAlamatLengkapWali">Alamat Lengkap Wali</label>
                        <input id="inputAlamatLengkapWali" type="text" name="alamat_lengkapwali" class="form-control" required placeholder="Alamat Lengkap Wali Sesuai kartu Identitas">
                    </div>

                    {{-- DATA KUNJUNGAN PASIEN --}}
                    <div class="form-group">
                        <label for="selectAsuransi">Asuransi</label>
                        <select id="selectAsuransi" name="asuransi" class="form-control" required placeholder="Jenis Asuransi Pasien Sesuai kartu Identitas">
                            <option value="BPJS">BPJS/KIS</option>
                            <option value="AsuranSI Lainnya">Asuransi Lainnya</option>
                            <option value="Reguler">Reguler</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectTujuanKunjungan">Tujuan Kunjungan</label>
                        <select id="selectTujuanKunjungan" name="tujuan_kunjungan" class="form-control" required placeholder="Pilih Tujuan Kunjungan">
                            <option value="Poli Umum">Poli Umum</option>
                            <option value="Poli KIA, KB, dan Imunisasi">Poli KIA,KB, dan Imunisasi</option>
                            <option value="Poli Gizi">Poli Gizi</option>
                            <option value="Poli TB dan Kusta">Poli TB dan Kusta</option>
                            <option value="Poli ISPA">Poli ISPA</option>
                            <option value="UGD">UGD</option>
                            <option value="Laboratorium">Laboratorium</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer" id="form-button-submit-cancel">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{route('data_kunjungan')}}" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection