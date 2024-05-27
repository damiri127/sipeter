@extends('petugas_loket.layouts.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit Data Kunjungan Puskesmas</h2>
    </div>
    <form action="/petugas_loket/datakunjungan/updateKunjungan/{{$data_kunjungan->id_kunjungan}}" method="POST">
        @csrf
        <div class="card-body" id="form-input">
            <div class="form-group">
                <label for="inpukNIK">Nomor NIK </label>
                <input id="inputNama" type="number" name="NIK" class="form-control" maxlength="16" required placeholder="16 Digit Angka NIK" value="{{$data_kunjungan->data_pengunjung->NIK}}" disabled>
            </div>
            <div class="form-group">
                <label for="inpukNama">Nama</label>
                <input id="inputNama" type="text" name="nama_pengunjung" class="form-control" required placeholder="Masukan Nama sesuai Kartu Identitas" value="{{$data_kunjungan->data_pengunjung->nama_pengunjung}}" disabled>
            </div>
            <div class="form-group">
                <label for="editTanggalKunjungan">Tanggal Kunjungan</label>
                <input type="datetime" name="tanggal_kunjungan" id="editTanggalKunjungan" class="form-control" value="{{$data_kunjungan->tanggal_kunjungan}}" disabled>
            </div>
            <div class="form-group">
                <label for="selectAsuransi">Asuransi Pengunjung</label>
                <select id="selectAsuransi" name="asuransi" class="form-control" required placeholder="Asal Kecamatan Pengunjung Sesuai kartu Identitas" disabled>
                    <option value="{{$data_kunjungan->data_pengunjung->asuransi}}">{{$data_kunjungan->data_pengunjung->asuransi}}</option>
                    <option value="BPJS">BPJS/KIS</option>
                    <option value="AsuranSI Lainnya">Asuransi Lainnya</option>
                    <option value="Reguler">Reguler</option>
                </select>
            </div>
            {{-- TUJUAN KUNJUNGAN PASIEN --}}
            <div class="form-group">
                <label for="selectTujuanKunjungan">Tujuan Kunjungan</label>
                <select id="selectTujuanKunjungan" name="tujuan_kunjungan" class="form-control" required placeholder="Pilih Tujuan Kunjungan">
                    <option value="{{$data_kunjungan->tujuan_kunjungan}}">{{$data_kunjungan->tujuan_kunjungan}}</option>
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
        <div class="card-footer">
            <a href="#" id="backConfirmation" class="btn btn-danger" data-href="{{route('data_kunjungan')}}" >Kembali</a>
            <button type="submit" class="btn btn-success">Perbarui</button>
        </div>
    </form>

    <script>
        $("#backConfirmation").click(function () {
            swal({
            title: 'Apakah Anda Ingin Berhenti Mengedit?',
            text: "Perubahan yang anda lakukan tidak akan tersimpan!",
            type: 'warning',
            buttons:{
                confirm: {
                    text: 'Kembali',
                    className : 'btn btn-danger',
                },
                cancel: {
                    visible: true,
                    text : 'Lanjutkan Mengedit',
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
@endsection