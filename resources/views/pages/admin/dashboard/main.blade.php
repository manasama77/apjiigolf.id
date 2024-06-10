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
                            <h3 id="count_Player">0</h3>
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
            })
        }
    </script>
@endsection
