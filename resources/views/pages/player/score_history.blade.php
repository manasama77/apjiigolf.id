@extends('layouts.landing')

@section('aku_isi_mas')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">PGA MEMBER</h3>
                        <h1 class="card-subtitle mb-2 text-center">SCORE HISTORY</h1>

                        <div class="row">
                            <div class="col-sm-12 col-md-6 offset-md-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Code</th>
                                                <th>:</th>
                                                <th>{{ $players->player->code }}</th>
                                            </tr>
                                            <tr>
                                                <th>Name</th>
                                                <th>:</th>
                                                <th>{{ $players->player->name }}</th>
                                            </tr>
                                            <tr>
                                                <th>Location</th>
                                                <th>:</th>
                                                <th>{{ $players->event_location->location->name }}</th>
                                            </tr>
                                            <tr>
                                                <th>Start Date</th>
                                                <th>:</th>
                                                <th>{{ $players->event_location->start_date->format('d F Y') }}</th>
                                            </tr>
                                            <tr>
                                                <th>Tee Off</th>
                                                <th>:</th>
                                                <th>1A</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header text-center fw-bold bg-primary text-white">
                                        HOLE BY HOLE SCORE
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        @for ($i = 1; $i <= 9; $i++)
                                                            <th class="text-center">PAR {{ $i }}</th>
                                                        @endfor
                                                        <th class="text-center">OUT</td>
                                                            @for ($i = 10; $i <= 18; $i++)
                                                        <th class="text-center">PAR {{ $i }}</td>
                                                            @endfor
                                                        <th class="text-center">IN</td>
                                                        <th class="text-center align-middle" rowspan="2">TOT</td>
                                                        <th class="text-center align-middle" rowspan="2">HCP</td>
                                                        <th class="text-center align-middle" rowspan="2">NET</td>
                                                    </tr>
                                                    <tr>
                                                        @for ($i = 1; $i <= 9; $i++)
                                                            <th class="text-center">
                                                                {{ $players->event_location->location->{'par_' . $i} }}
                                                            </th>
                                                        @endfor
                                                        <th class="text-center">
                                                            {{ $players->event_location->location->out }}</th>
                                                        @for ($i = 10; $i <= 18; $i++)
                                                            <th class="text-center">
                                                                {{ $players->event_location->location->{'par_' . $i} }}
                                                            </th>
                                                        @endfor
                                                        <th class="text-center">{{ $players->event_location->location->in }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @for ($i = 1; $i <= 9; $i++)
                                                            <td class="text-center">{{ $players->{'par_' . $i} }}</td>
                                                        @endfor
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <h6 class="text-end">
                            <a href="#" ondblclick="redirectAdmin()" class="text-decoration-none">
                                Copyright ©️ PGA 2023
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('skrip_jawa')
    <script>
        function redirectAdmin() {
            window.location.replace('{{ route('login') }}', '_blank')
        }
    </script>
@endsection
