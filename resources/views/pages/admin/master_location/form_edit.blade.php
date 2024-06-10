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

                            <form action="{{ route('admin.master_location.update', $lists->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') ?? $lists->name }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ old('address') ?? $lists->address }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="contact">Contact</label>
                                    <input type="tel" class="form-control" id="contact" name="contact"
                                        value="{{ old('contact') ?? $lists->contact }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="out">
                                        OUT (<small>Par 1 ~ 9</small>)
                                    </label>
                                    <input type="number" class="form-control" id="out" name="out"
                                        value="{{ old('out') ?? $lists->out }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="in">
                                        IN (<small>Par 10 ~ 18</small>)
                                    </label>
                                    <input type="number" class="form-control" id="in" name="in"
                                        value="{{ old('in') ?? $lists->in }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="banner">Banner</label>
                                    <input type="file" class="form-control" id="banner" name="banner"
                                        accept="image/*" />
                                    <span class="text-muted">leave blank if there are no banner changes</span>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-fw fa-save"></i> Save
                                </button>
                                <a href="{{ route('admin.admin') }}" class="btn btn-secondary btn-block">
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
