@extends('layouts.dashboard')

@section('aku_isi_mas')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $page_title }}</h1>
                </div><!-- /.col -->
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.player_score.update', $lists->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="event_location_id">Event Location</label>
                                            <select class="form-control" id="event_location_id" name="event_location_id"
                                                required>
                                                <option value=""></option>
                                                @foreach ($events as $l)
                                                    <option @selected($l->id == $lists->event_location_id) value="{{ $l->id }}">
                                                        {{ $l->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="player_id">Player</label>
                                            <select class="form-control" id="player_id" name="player_id" required>
                                                <option value=""></option>
                                                @foreach ($players as $l)
                                                    <option @selected($l->id == $lists->player_id) value="{{ $l->id }}">
                                                        {{ $l->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tee_off">Tee Off (Hole)</label>
                                            <select class="form-control" id="tee_off" name="tee_off" required>
                                                <option @selected($lists->tee_off == 1) value="1">1</option>
                                                <option @selected($lists->tee_off == 10) value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="out">Out <small>Par 1 ~ 9</small></label>
                                            <input type="number" class="form-control" id="out" name="out"
                                                min="1" max="200" value="{{ old('out') ?? $lists->out }}"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="in">In <small>Par 10 ~ 18</small></label>
                                            <input type="number" class="form-control" id="in" name="in"
                                                min="1" max="200" value="{{ old('in') ?? $lists->in }}"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="gross">Gross </label>
                                            <input type="number" class="form-control" id="gross" name="gross"
                                                min="1" max="200" value="{{ old('gross') ?? $lists->gross }}"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="handicap">Handicap </label>
                                            <input type="number" class="form-control" id="handicap" name="handicap"
                                                min="1" max="28"
                                                value="{{ old('handicap') ?? $lists->handicap }}" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="net">Net </label>
                                            <input type="number" class="form-control" id="net" name="net"
                                                min="1" max="100" value="{{ old('net') ?? $lists->net }}"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-fw fa-save"></i> Save
                                </button>
                                <a href="{{ route('admin.player_score') }}" class="btn btn-secondary btn-block">
                                    <i class="fas fa-fw fa-backward"></i> Back
                                </a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
