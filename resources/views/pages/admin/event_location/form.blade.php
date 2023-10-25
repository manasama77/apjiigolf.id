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
                <div class="col-sm-12 col-md-4 offset-md-4">
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

                            <form action="{{ route('admin.event_location.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="location_id">Location</label>
                                    <select class="form-control" id="location_id" name="location_id" required>
                                        <option value=""></option>
                                        @foreach ($locations as $l)
                                            <option value="{{ $l->id }}">{{ $l->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date"
                                        value="{{ old('start_date') }}" required />
                                </div>
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-fw fa-save"></i> Save
                                </button>
                                <a href="{{ route('admin.event_location') }}" class="btn btn-secondary btn-block">
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
