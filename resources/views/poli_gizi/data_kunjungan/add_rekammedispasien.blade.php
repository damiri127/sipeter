@extends('poli_gizi.layouts.layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Rekam Medis Pasien Poli Gizi</h2>
    </div>
    <div class="formulir_rekammedis">
        <form action="{{route('store_rekammedis', ['id_kunjungan'=>$id_kunjungan])}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group" id="nama_pasien">
                    <label for="inpukNIK">Nama Pasien</label>
                    <input id="inputNama" type="text" name="nama_pasien" class="form-control" maxlength="16" required placeholder="16 Digit Angka NIK" value="{{$pasien->data_pengunjung->nama_pengunjung}}" disabled>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group" id="tgl_lahir">
                            <label for="inpukNIK">Tanggal Lahir</label>
                            <input id="inputNama" type="text" name="nama_pasien" class="form-control" maxlength="16" required placeholder="16 Digit Angka NIK" value="{{$pasien->data_pengunjung->tanggal_lahir}}" disabled>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" id="umur_pasien">
                            <label for="inpukNIK">Umur Pasien</label>
                            <input id="inputNama" type="number" name="nama_pasien" class="form-control" maxlength="16" required placeholder="16 Digit Angka NIK" value="{{Carbon\Carbon::parse($pasien->data_pengunjung->tanggal_lahir)->age}}" disabled>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" id="umur_pasien">
                            <label for="inpukNIK">Kategori Pasien</label>
                            <select id="kategoriPasien" type="text" name="kategori_pasien" class="form-control" required placeholder="Kategori Pasien">
                                <option disabled selected value>Pilih Kategori Pasien</option>
                                <option value="Ibu Hamil">Ibu Hamil</option>
                                <option value="Ibu Nifas">Ibu Nifas</option>
                                <option value="Balita">Balita</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-group" id="berat_badan">
                            <label for="inpukNIK">Berat Badan (kg)</label>
                            <input required id="inputNama" type="number" name="berat_badan" class="form-control" maxlength="3" required placeholder="Berat badan pasien">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" id="tinggi_badan">
                            <label for="tinggi_badan">Tinggi Badan (cm)</label>
                            <input required id="inputNama" type="number" name="tinggi_badan" class="form-control" maxlength="3" required placeholder="Tinggi badan pasien">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" id="sistolik">
                            <label for="tekanan_darah">Tekanan Darah Sistolik (mmHg)</label>
                            <input required id="tekanan_darah" type="number" name="sistolik" class="form-control" maxlength="3" required placeholder="Sistolik pasien">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" id="diastolik">
                            <label  for="tekanan_darah">Tekanan Darah Diastolik (mmHg)</label>
                            <input required id="tekanan_darah" type="number" name="diastolik" class="form-control" maxlength="3" required placeholder="Sistolik pasien">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" id="ukuran_lila">
                            <label  for="ukuran_lila">Ukuran Lila (cm)</label>
                            <input required id="tekanan_darah" type="number" name="ukuran_lila" class="form-control" maxlength="3" required placeholder="Ukuran Lila pasien">
                        </div>
                    </div>
                </div>
                <div class="form-group" id="anamnesa">
                    <label for="inpukNIK">Anamnesa</label>
                    <textarea required class="form-control" id="exampleFormControlTextarea1" rows="3" name="anamnesa" placeholder="Rincian keluhan pasien"></textarea>
                </div>

                <div class="row mt-2" id="diagnosis-pasien">
                    <div class="col">
                        <div class="form-group" id="diagnosis1">
                            <label for="diagnosis1">Diagnosis 1</label>
                            <input required class="form-control" type="text" name="diagnosis1" id="diagnosis_1" placeholder="Diagnosis Pasien">
                            <input required class="form-control" type="hidden" name="id_diagnosis1" id="id_diagnosis1">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" id="diagnosis2">
                            <label for="diagnosis2">Diagnosis 2</label>
                            <input required class="form-control" type="text" name="diagnosis2" id="diagnosis_2" placeholder="Diagnosis Pasien">
                            <input required class="form-control" type="hidden" name="id_diagnosis2" id="id_diagnosis2">
                        </div>
                    </div>
                </div>
                

                <div class="row mt-2" id="perolehan-obat-tablet-tambah-darah">
                    <div class="col">
                        <div class="form-group" id="perolehan_tablet_tambah_darah_30fe1">
                            <label for="inpukNIK">Perolehan tablet tambah darah 30 Fe1</label>
                            <select type="text" name="perolehan_tablet_tambah_darah_30fe1" class="form-control" required>
                                <option disabled selected value>Tentukan perolehan obat</option>
                                <option value="Dapat">Dapat</option>
                                <option value="Tidak Dapat">Tidak Dapat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" id="perolehan_tablet_tambah_darah_90fe3">
                            <label for="inpukNIK">Perolehan tablet tambah darah 90 Fe3</label>
                            <select type="text" name="perolehan_tablet_tambah_darah_90fe3" class="form-control" required>
                                <option disabled selected value>Tentukan perolehan obat</option>
                                <option value="Dapat">Dapat</option>
                                <option value="Tidak Dapat">Tidak Dapat</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-2" id="perolehan-obat-sirup-tambah-darah">
                    <div class="col">
                        <div class="form-group" id="perolehan_sirup_tambah_darag_febal1">
                            <label for="inpukNIK">Perolehan Sirup Tambah Darah Febal 1</label>
                            <select type="text" name="perolehan_sirup_tambah_darah_febal1" class="form-control" required>
                                <option disabled selected value>Tentukan perolehan obat</option>
                                <option value="Dapat">Dapat</option>
                                <option value="Tidak Dapat">Tidak Dapat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" id="perolehan_sirup_tambah_darag_febal2">
                            <label for="inpukNIK">Perolehan Sirup Tambah Darah Febal 2</label>
                            <select type="text" name="perolehan_sirup_tambah_darah_febal2" class="form-control" required>
                                <option disabled selected value>Tentukan perolehan obat</option>
                                <option value="Dapat">Dapat</option>
                                <option value="Tidak Dapat">Tidak Dapat</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row" id="perolehan_obatlainnya">
                    <div class="col">
                        <div class="form-group" id="perolehan_kapsul_yudium">
                            <label for="inpukNIK">Perolehan Kapsul Yudium</label>
                            <select type="text" name="perolehan_kapsul_yudium" class="form-control" required>
                                <option disabled selected value>Tentukan perolehan obat</option>
                                <option value="Dapat">Dapat</option>
                                <option value="Tidak Dapat">Tidak Dapat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" id="perolehan_vitaminA_dosistinggi">
                            <label for="inpukNIK">Perolehan Vitamin A Dosis Tinggi</label>
                            <select type="text" name="perolehan_vitaminA_dosistinggi" class="form-control" required>
                                <option disabled selected value>Tentukan perolehan obat</option>
                                <option value="Dapat">Dapat</option>
                                <option value="Tidak Dapat">Tidak Dapat</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group" id="status_rujukan">
                    <label for="inputJeniKelamin">Status Rujukan</label>
                    <select id="inputJenisKelamin" type="text" name="status_rujukan" class="form-control" required placeholder="Status Rujukan Pasien">
                        <option disabled selected value>Pilih Status Rujukan Pasien</option>
                        <option value="rujukan internal">Rujukan Internal</option>
                        <option value="rujukan eksternal">Rujukan Eksternal</option>
                        <option value="tidak perlu">Tidak Perlu</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="#" data-href="{{route('data_kunjunganpoligizi')}}" class="btn btn-danger" id="backConfirmation">Kembali</a>
                <script>
                    $("#backConfirmation").click(function () {
                        swal({
                            title: 'Batal Menginputkan Rekam Medis Pasien?',
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
</div>

{{-- Style Design Recomendation Autocomplete --}}
<style>
    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        /* Prevent horizontal scrollbar */
        overflow-x: hidden;
        z-index: 1000;
        background-color: #fff;
        border: 1px solid #ddd;
        font-size: 14px;
        font-family: Arial, sans-serif;
    }
    .ui-menu-item {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        list-style-type: none; /* Remove the default dot marker */
    }
    .ui-menu-item:hover {
        background-color: #f0f0f0;
        cursor: pointer;
    }
    .ui-menu .ui-menu-item-wrapper {
        font-size: 14px;
        color: #333;
    }
</style>

{{-- AUTO COMPLETE AND VALIDATION INPUT DIAGNOSIS 1 --}}
<script type="text/javascript">
    $(document).ready(function(){
        var selectedDiagnosis1 = null;

        $('#diagnosis_1').autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "{{url('/poligizi/search-icdx')}}",
                    data: {
                        term: request.term
                    },
                    dataType: "json",
                    success: function(data){
                        response(data);
                    },
                    error: function(xhr, status, error){
                        console.log('Error: ' + error);
                    }
                });
            },
            minLength: 2,
            select: function(event, ui){
                $('#diagnosis_1').val(ui.item.label);
                $('#id_diagnosis1').val(ui.item.value);
                selectedDiagnosis1 = ui.item;
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            return $("<li>")
                .append("<div><strong>" + item.label + "</strong><br><span>" + item.desc + "</span></div>")
                .appendTo(ul);
        };

        $('form').on('submit', function(event) {
            if (!selectedDiagnosis1 || $('#diagnosis_1').val() !== selectedDiagnosis1.label) {
                swal("Gagal", "Masukan data diagnosis dengan benar!", {
                    buttons: {
                        confirm: {
                            className : 'btn btn-danger'
                        }
                    },
                });
                // alert('');
                event.preventDefault();
            }
        });
    });
</script>

{{-- AUTO COMPLETE AND VALIDATION INPUT DIAGNOSIS 2 --}}
<script type="text/javascript">
    $(document).ready(function(){
        var selectedDiagnosis2 = null;

        $('#diagnosis_2').autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "{{url('/poligizi/search-icdx')}}",
                    data: {
                        term: request.term
                    },
                    dataType: "json",
                    success: function(data){
                        response(data);
                    },
                    error: function(xhr, status, error){
                        console.log('Error: ' + error);
                    }
                });
            },
            minLength: 2,
            select: function(event, ui){
                $('#diagnosis_2').val(ui.item.label);
                $('#id_diagnosis2').val(ui.item.value);
                selectedDiagnosis2 = ui.item;
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            return $("<li>")
                .append("<div><strong>" + item.label + "</strong><br><span>" + item.desc + "</span></div>")
                .appendTo(ul);
        };

        $('form').on('submit', function(event) {
            if (!selectedDiagnosis2 || $('#diagnosis_2').val() !== selectedDiagnosis2.label) {
                swal("Gagal", "Masukan data diagnosis dengan benar!", {
                    buttons: {
                        confirm: {
                            className : 'btn btn-danger'
                        }
                    },
                });
                event.preventDefault();
            }
        });
    });
</script>

@endsection
