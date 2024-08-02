@extends('layouts.dashboard')

@section('aku_isi_mas')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_admin">0</h3>
                            <p>Admin</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-secret"></i>
                        </div>
                        <a href="{{ route('admin.admin') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_location">0</h3>
                            <p>Location</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map"></i>
                        </div>
                        <a href="{{ route('admin.master_location') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_event_location">0</h3>
                            <p>Event Location</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map"></i>
                        </div>
                        <a href="{{ route('admin.event_location') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_player">0</h3>
                            <p>Player</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('admin.player_management') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>

            <hr class="pt-4">

            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">APJII GOLF TOURNAMENT 7</h1>
                </div>

                <div class="col-lg-3 col-6 mx-auto">

                    <div class="small-box bg-primary">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_apjii_7_register">0</h3>
                            <p>Register</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_apjii_7_pending">0</h3>
                            <p>Waiting Payment</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_apjii_7_paid">0</h3>
                            <p>Paid</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_apjii_7_expired">0</h3>
                            <p>Expired</p>
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

            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_apjii_7_shirt_xs">0</h3>
                            <p>Shirt Size XS</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_apjii_7_shirt_s">0</h3>
                            <p>Shirt Size S</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_apjii_7_shirt_m">0</h3>
                            <p>Shirt Size M</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_apjii_7_shirt_l">0</h3>
                            <p>Shirt Size L</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_apjii_7_shirt_xl">0</h3>
                            <p>Shirt Size XL</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_apjii_7_shirt_xxl">0</h3>
                            <p>Shirt Size XXL</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_apjii_7_shirt_xxxl">0</h3>
                            <p>Shirt Size XXXL</p>
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
            }, 60000);
        })

        function getCount() {
            $.ajax({
                url: `{{ route('count_countan') }}`,
                method: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('.loading_card').show()
                }
            }).always(() => {
                $('.loading_card').hide()
            }).fail(e => {
                console.log(e.responseText)
            }).done(e => {
                console.log(e.data)
                $('#count_admin').text(e.data.count_admin)
                $('#count_location').text(e.data.count_location)
                $('#count_event_location').text(e.data.count_event_location)
                $('#count_player').text(e.data.count_player)
                $('#count_apjii_7_register').text(e.data.count_apjii_7_register)
                $('#count_apjii_7_pending').text(e.data.count_apjii_7_pending)
                $('#count_apjii_7_paid').text(e.data.count_apjii_7_paid)
                $('#count_apjii_7_expired').text(e.data.count_apjii_7_expired)
                $('#count_apjii_7_checkin').text(e.data.count_apjii_7_checkin)
                $('#count_apjii_7_shirt_s').text(e.data.count_apjii_7_shirt_s)
                $('#count_apjii_7_shirt_m').text(e.data.count_apjii_7_shirt_m)
                $('#count_apjii_7_shirt_l').text(e.data.count_apjii_7_shirt_l)
                $('#count_apjii_7_shirt_xl').text(e.data.count_apjii_7_shirt_xl)
                $('#count_apjii_7_shirt_xxl').text(e.data.count_apjii_7_shirt_xxl)
                $('#count_apjii_7_shirt_xxxl').text(e.data.count_apjii_7_shirt_xxxl)
            })
        }
    </script>
@endsection
