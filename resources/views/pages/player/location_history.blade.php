@extends('layouts.landing')

@section('aku_isi_mas')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('android-chrome-192x192.png') }}" alt="PGA Logo" class="img-fluid" />
                        </div>
                        <h1 class="card-subtitle mb-4 text-center fw-semibold">{{ $player_name }} - Location History</h1>

                        <div class="row">
                            @foreach ($players as $p)
                                <div class="col-sm-12 col-md-4">
                                    <div class="card bg-dark text-white shadow-sm">
                                        <img src="{{ asset('storage/' . $p->banner) }}"
                                            class="card-img img-overlay-card img-fluid" alt="..."
                                            style="height: 270px;">
                                        <div class="card-body">
                                            <div class="card-img-overlay">
                                                <h4 class="card-title">{{ $p->nama_lokasi }}</h4>
                                                <p><i class="fas fa-calendar fa-fw"></i>
                                                    {{ \Carbon\Carbon::parse($p->start_date)->format('d F Y') }}</p>
                                                <p class="card-text" style="height: 100px;">
                                                    {{ $p->alamat_lokasi }}
                                                </p>
                                                <div class="table-responsive">
                                                    <table class="table table-info">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">GROSS</th>
                                                                <th class="text-center">HANDICAP</th>
                                                                <th class="text-center">NET</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center">{{ $p->gross }}</td>
                                                                <td class="text-center">{{ $p->handicap }}</td>
                                                                <td class="text-center">{{ $p->net }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a href="{{ route('home') }}" class="btn btn-secondary w-100 mt-3">
                            <i class="fas fa-fw fa-backward-step"></i> Back
                        </a>
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
