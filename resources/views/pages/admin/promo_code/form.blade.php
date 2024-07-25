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

                            <form action="{{ route('admin.promo_code.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="code">Promo Code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="code" name="code"
                                            value="{{ $code }}" required readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                onclick="copyToClipboard('{{ $code }}')">
                                                <i class="fas fa-fw fa-copy"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" required />
                                </div>
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-fw fa-save"></i> Save
                                </button>
                                <a href="{{ route('admin.promo_code') }}" class="btn btn-secondary btn-block">
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
