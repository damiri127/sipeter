@extends('admin.layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit Data UKM</h2>
    </div>
    <form action="{{route('update_ukm', ['id_ukm'=>$ukm->id_ukm])}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="inpukNama">Nama UKM</label>
                <input id="inputNama" type="text" name="nama_ukm" class="form-control" required placeholder="Masukan Nama UKM..." value="{{$ukm->nama_jenis_ukm}}">
            </div>
            <div class="form-group">
                <label for="inpukNama">Penanggung Jawab</label>
                <input id="nama_pj" type="text" name="nama" class="form-control" required placeholder="Masukan Penanggung Jawab UKM..." value="{{$ukm->nama}}" data-value="{{$ukm}}">
                <input required class="form-control" type="hidden" name="penanggung_jawab_ukm" id="id_pj_ukm" value="{{$ukm->penanggung_jawab_ukm}}" >
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-success" type="submit">Perbarui</button>
            <a href="#" class="btn btn-danger" id="backConfirmation" data-href="{{route('mengelola_ukm')}}">Kembali</a>
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

{{-- Design Autocomplete Nama PJ --}}
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

{{-- AUTO COMPLETE AND VALIDATION INPUT --}}
<script type="text/javascript">
$(document).ready(function(){
    var selectedPjUkm = null;

    $('#nama_pj').autocomplete({
        source: function(request, response){
            $.ajax({
                url: "{{ route('search_pj_ukm') }}",
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
            $('#nama_pj').val(ui.item.label);
            $('#id_pj_ukm').val(ui.item.value);
            selectedPjUkm = ui.item;
            return false;
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        return $("<li>")
            .append("<div><strong>" + item.label + "</strong><br><span>" + item.desc + "</span></div>")
            .appendTo(ul);
    };

    $('form').on('submit', function(event) {
        if (!selectedPjUkm || $('#nama_pj').val() !== selectedPjUkm.label) {
            swal("Gagal", "Masukkan data penanggung jawab dengan benar!", {
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