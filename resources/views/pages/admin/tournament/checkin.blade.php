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

            <div class="row justify-content-center">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_merokok_1">0</h3>
                            <p>Merokok</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-smoking"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_merokok_0">0</h3>
                            <p>Tidak Merokok</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-ban-smoking"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_merokok_2">0</h3>
                            <p>Tidak Menjawab</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>NAMA</td>
                                            <td>MEROKOK</td>
                                            <td>CHECKIN</td>
                                        </tr>
                                    </thead>
                                    <tbody id="vbody">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('skrip_jawa')
    <script>
        let temp_player_name = null;

        $(document).ready(() => {
            $('#barcode').focus();
            getCount()

            setInterval(() => {
                getCount()
            }, 5000);


            $('#form').on('submit', e => {
                e.preventDefault();
                getPlayerName();
            })
        })

        function getCount() {
            $.ajax({
                url: `{{ route('count_countan') }}`,
                method: 'get',
                dataType: 'json',
                beforeSend: function() {
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
                $('#count_merokok_1').text(e.data.count_merokok_1)
                $('#count_merokok_0').text(e.data.count_merokok_0)
                $('#count_merokok_2').text(e.data.count_merokok_2)

                let htmlnya = ``;
                let apjii7_checked = e.data.apjii7_checked
                apjii7_checked.forEach(l => {
                    let first_name = l.first_name;
                    let last_name = l.last_name;
                    let full_name = `${first_name} ${last_name}`
                    let updated_at = moment(l.updated_at).format('YYYY-MM-DD HH:mm:ss');
                    let merokok = l.merokok;

                    let text_merokok = "Tidak Menjawab";
                    if (merokok == 1) {
                        text_merokok = "Ya";
                    } else if (merokok == 0) {
                        text_merokok = "Tidak";
                    }

                    htmlnya += `
                    <tr>
                        <td>${full_name}</td>
                        <td>${text_merokok}</td>
                        <td>${updated_at}</td>
                    </tr>
                    `
                });

                $('#vbody').html(htmlnya)
            })
        }

        function getPlayerName() {
            $.ajax({
                url: "{{ route('admin.tournament.get_player_name') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                    barcode: $('#barcode').val()
                }
            }).fail(response => {
                console.log(response)
                Swal.fire({
                    title: "Error",
                    text: response.responseJSON.message,
                    icon: "error",
                    timer: 2000,
                    showConfirmButton: false,
                }).then(() => {
                    $('#barcode').val('').focus()
                })
            }).done(response => {
                console.log(response);

                temp_player_name = response.player_name;

                Swal.fire({
                    title: `Apakah player ${temp_player_name} merokok ?`,
                    text: "jangan lupa tanyakan ini pada peserta",
                    icon: "question",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Ya Merokok",
                    cancelButtonText: "Tidak Menjawab",
                    denyButtonText: "Tidak Merokok",
                }).then((result) => {
                    let merokok = 2;
                    if (result.isConfirmed) {
                        merokok = 1;
                    } else if (result.isDenied) {
                        merokok = 0;
                    }

                    storeBarcode(merokok)
                });
            });
        }

        function storeBarcode(merokok = 2) {
            $.ajax({
                url: "{{ route('admin.tournament.checkin.store') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    barcode: $('#barcode').val(),
                    merokok: merokok,
                }
            }).fail(response => {
                console.log(response)
                Swal.fire({
                    title: "Error",
                    text: response.responseJSON.message,
                    icon: "error",
                    timer: 2000,
                    showConfirmButton: false,
                }).then(() => {
                    $('#barcode').val('').focus()
                })
            }).done(response => {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    timer: 1800,
                    showConfirmButton: false
                }).then(() => {
                    $('#barcode').val('').focus()
                })
            })

        }
    </script>
@endsection
