@extends('layouts.dashboard')

@section('aku_isi_mas')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $page_title }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">

            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-md-2 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Checkin
                    </div>
                    <div class="card-body">
                        <form id="form">
                            <label for="barcode">Barcode</label>
                            <input type="text" class="form-control" id="barcode" required />
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-3 col-6 offset-lg-3">
                <div class="small-box bg-success">
                    <div class="overlay dark loading_card" style="display: none;">
                        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    </div>
                    <div class="inner">
                        <h3 id="count_apjii_7_paid">0</h3>
                        <p>Register</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="overlay dark loading_card" style="display: none;">
                        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    </div>
                    <div class="inner">
                        <h3 id="count_apjii_7_checkin">0</h3>
                        <p>Checkin</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('skrip_jawa')
<script>
    $(document).ready(() => {
        getCount()

        setInterval(() => {
            getCount()
        }, 1000);


        $('#form').on('submit', e => {
            e.preventDefault();
            storeBarcode()
        })

        $('#barcode').on('change', e => {
            storeBarcode()
        })
    })

    function storeBarcode() {
        $.ajax({
            url: "{{ route('admin.tournament.checkin.store') }}"
            , type: 'POST'
            , dataType: 'json'
            , data: {
                barcode: $('#barcode').val()
            }
        }).fail(response => {
            console.log(response)
            Swal.fire({
                title: "Error"
                , text: response.responseJSON.message
                , icon: "error"
                , timer: 2000
                , showConfirmButton: false
            , }).then(() => {
                $('#barcode').val('').focus()
            })
        }).done(response => {
            Swal.fire({
                title: "Success"
                , text: response.message
                , icon: "success"
                , timer: 2000
                , showConfirmButton: false
            }).then(() => {
                $('#barcode').val('').focus()
            })
        })

    }

    function getCount() {
        $.ajax({
            url: `{{ route('count_countan') }}`
            , method: 'get'
            , dataType: 'json'
            , beforeSend: function() {
                // $('.loading_card').show()
            }
        }).always(() => {
            // $('.loading_card').hide()
        }).fail(e => {
            console.log(e.responseText)
        }).done(e => {
            console.log(e.data)
            $('#count_apjii_7_paid').text(e.data.count_apjii_7_paid)
            $('#count_apjii_7_checkin').text(e.data.count_apjii_7_checkin)
        })
    }

</script>
@endsection