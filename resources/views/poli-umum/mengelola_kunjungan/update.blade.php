@extends('poli-umum.layouts.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Data Penanganan Pasien Puskesmas</h2>
    </div>
    <form action="#" method="POST">
        @csrf
        <div class="card-body" id="form-input">
            <div class="form-group">
                <label for="inpukNama">Nama</label>
                <input id="inputNama" type="text" name="nama_pasien" class="form-control" required placeholder="Masukan Nama sesuai Kartu Identitas" value="{{$penanganan->nama_pengunjung}}" disabled>
            </div>
            <div class="form-group">
                <label for="inputAnamnesa">Anemnesa</label>
                <input id="inputAnamnesa" type="text" name="anamnesa" class="form-control" required placeholder="Masukin Keluhan pasien">
            </div>
            <div class="form-group">
                <label for="inputBB">Berat badan</label>
                <input id="inputBB" type="number" name="berat_badan" class="form-control" required placeholder="Masukin BB pasien">
            </div>
            <div class="form-group">
                <label for="inputTB">Tinggi Badan</label>
                <input id="inputTB" type="number" name="tinggi_badan" class="form-control" required placeholder="Masukin TB pasien">
            </div>
            <div class="form-group">
                <label for="inputSistol">Sistolik</label>
                <input id="inputSistol" type="text" name="sistolik" class="form-control" required placeholder="120 mmHg" maxlength="3">
            </div>
            <div class="form-group">
                <label for="inputDiastol">Diastolik</label>
                <input id="inputDiastol" type="text" name="diastolik" class="form-control" required placeholder="80 mmHg" maxlength="3">
            </div>
            <div class="form-group">
                <label for="inputDiagnosa">Diagnosa</label>
                <input id="inputDiagnosa" type="search" name="diagnosa" class="form-control" required placeholder="Masukin diagnosa pasien">
            </div>
            <div class="form-group">
                <label for="inputKeterangan">keterangan</label>
                <input id="inputKeterangan" type="text" name="keterangan" class="form-control" required placeholder="Masukin keterangan buat pasien">
            </div>
        </div>
        <div class="card-footer">
            <a href="#" id="backConfirmation" class="btn btn-danger" data-href="{{route('data_poliumum')}}">Kembali</a>
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