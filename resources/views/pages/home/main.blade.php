@extends('layouts.landing')

@section('aku_isi_mas')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center fw-light">PGA MEMBER</h3>
                        <h1 class="card-subtitle mb-2 text-center fw-semibold">STANDINGS</h1>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th class="text-center">RANK</th>
                                        <th>PLAYER NAME</th>
                                        <th class="text-center">
                                            @if ($tp == 'desc')
                                                <a href="{{ route('home') }}?tp=asc&g={{ $g }}&h={{ $h }}&n={{ $n }}"
                                                    class="text-white ms-2">
                                                    TOTAL PLAY
                                                    <i class="fa-solid fa-caret-up"></i>
                                                </a>
                                            @endif

                                            @if ($tp == 'asc')
                                                <a href="{{ route('home') }}?tp=desc&g={{ $g }}&h={{ $h }}&n={{ $n }}"
                                                    class="text-white ms-2">
                                                    TOTAL PLAY
                                                    <i class="fa-solid fa-caret-down"></i>
                                                </a>
                                            @endif
                                        </th>
                                        <th class="text-center">
                                            @if ($g == 'desc')
                                                <a href="{{ route('home') }}?tp={{ $tp }}&g=asc&h={{ $h }}&n={{ $n }}"
                                                    class="text-white ms-2">
                                                    GROSS
                                                    <i class="fa-solid fa-caret-up"></i>
                                                </a>
                                            @endif

                                            @if ($g == 'asc')
                                                <a href="{{ route('home') }}?tp={{ $tp }}&g=desc&h={{ $h }}&n={{ $n }}"
                                                    class="text-white ms-2">
                                                    GROSS
                                                    <i class="fa-solid fa-caret-down"></i>
                                                </a>
                                            @endif
                                        </th>
                                        <th class="text-center">
                                            @if ($h == 'desc')
                                                <a href="{{ route('home') }}?tp={{ $tp }}&g={{ $g }}&h=asc&n={{ $n }}"
                                                    class="text-white ms-2">
                                                    HANDICAP
                                                    <i class="fa-solid fa-caret-up"></i>
                                                </a>
                                            @endif

                                            @if ($h == 'asc')
                                                <a href="{{ route('home') }}?tp={{ $tp }}&g={{ $g }}&h=desc&n={{ $n }}"
                                                    class="text-white ms-2">
                                                    HANDICAP
                                                    <i class="fa-solid fa-caret-down"></i>
                                                </a>
                                            @endif
                                        </th>
                                        <th class="text-center">
                                            @if ($n == 'desc')
                                                <a href="{{ route('home') }}?tp={{ $tp }}&g={{ $g }}&h={{ $h }}&n=asc"
                                                    class="text-white ms-2">
                                                    NET
                                                    <i class="fa-solid fa-caret-up"></i>
                                                </a>
                                            @endif

                                            @if ($n == 'asc')
                                                <a href="{{ route('home') }}?tp={{ $tp }}&g={{ $g }}&h={{ $h }}&n=desc"
                                                    class="text-white ms-2">
                                                    NET
                                                    <i class="fa-solid fa-caret-down"></i>
                                                </a>
                                            @endif
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($players as $p)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ route('player.event.history', $p->id) }}">
                                                    {{ $p->name }}
                                                </a>
                                            </td>
                                            <td class="text-center">{{ $p->total_play }}</td>
                                            <td class="text-center">{{ $p->gross }}</td>
                                            <td class="text-center">{{ $p->handicap }}</td>
                                            <td class="text-center">{{ $p->net }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
