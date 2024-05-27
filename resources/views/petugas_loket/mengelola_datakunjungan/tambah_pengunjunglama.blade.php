@extends('petugas_loket.layouts.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Input Kunjungan Pengunjung Lama</h2>
    </div>
    {{-- FORM ADD DATA KUNJUNGAN PENGUNJUNG LAMA --}}
    <form action="{{route('insert_kunjunganPengunjungLama', ['id_pengunjung'=>$data_pengunjung->id_pengunjung])}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="inpukNIK">Nomor NIK </label>
                <input id="inputNama" type="number" name="NIK" class="form-control" maxlength="16" required placeholder="16 Digit Angka NIK" value="{{$data_pengunjung->NIK}}" disabled>
            </div>
            <div class="form-group">
                <label for="inpukNama">Nama</label>
                <input id="inputNama" type="text" name="nama_pengunjung" class="form-control" required placeholder="Masukan Nama sesuai Kartu Identitas" value="{{$data_pengunjung->nama_pengunjung}}" disabled>
            </div>
            <div class="form-group">
                <label for="inputJeniKelamin">Jenis Kelamin</label>
                <select id="inputJenisKelamin" type="text" name="jenis_kelamin" class="form-control" required placeholder="Asal Kecamatan Pengunjung Sesuai kartu Identitas" disabled>
                    <option value="{{$data_pengunjung->jenis_kelamin}}">{{$data_pengunjung->jenis_kelamin}}</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="selectAsuransi">Asuransi Pengunjung</label>
                <select id="selectAsuransi" name="asuransi" class="form-control" required placeholder="Asal Kecamatan Pengunjung Sesuai kartu Identitas" disabled>
                    <option value="{{$data_pengunjung->asuransi}}">{{$data_pengunjung->asuransi}}</option>
                    <option value="BPJS">BPJS/KIS</option>
                    <option value="AsuranSI Lainnya">Asuransi Lainnya</option>
                    <option value="Reguler">Reguler</option>
                </select>
            </div>
            {{-- TUJUAN KUNJUNGAN PASIEN --}}
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
            <div class="card-footer">
                <a href="#" id="backConfirmation" class="btn btn-danger" data-href="{{route('data_kunjungan')}}" >Kembali</a>
                <script>
                    $("#backConfirmation").click(function () {
                        swal({
                            title: 'Batal Menambahkan Data Kunjungan?',
                            text: "Semua Inputan Akan Hilang Jika Anda Kembali",
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
                <button type="submit" class="btn btn-success">Tambahkan</button>
            </div>
        </div>
    </form>
</div>
@endsection