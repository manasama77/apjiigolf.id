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

                            <form action="{{ route('register_internal_store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        value="{{ old('first_name') }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        value="{{ old('last_name') }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender" @checked(old('gender'))
                                        required>
                                        <option @selected(old('gender') == 'male') value="male">Male
                                        </option>
                                        <option @selected(old('gender') == 'female') value="female">Female
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="whatsapp_number">Phone Number / Mobile Number</label>
                                    <input type="tel" class="form-control" id="whatsapp_number" name="whatsapp_number"
                                        value="{{ old('whatsapp_number') }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name"
                                        value="{{ old('company_name') }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="position">Position</label>
                                    <select class="form-control" id="position" name="position" @checked(old('position'))
                                        required>
                                        <option value=""></option>
                                        <option @selected(old('position') == 'Commissioner') value="Commissioner">
                                            Commissioner
                                        </option>
                                        <option @selected(old('position') == 'C Level') value="C Level">C Level
                                        </option>
                                        <option @selected(old('position') == 'Vice President') value="Vice President">
                                            Vice
                                            President
                                        </option>
                                        <option @selected(old('position') == 'General Manager') value="General Manager">
                                            General
                                            Manager
                                        </option>
                                        <option @selected(old('position') == 'Manager - Senior Manager') value="Manager - Senior Manager">
                                            Manager -
                                            Senior
                                            Manager
                                        </option>
                                        <option @selected(old('position') == 'Staff - Supervisor') value="Staff - Supervisor">
                                            Staff -
                                            Supervisor
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="institution">Institution</label>
                                    <select class="form-control" id="institution" name="institution"
                                        @checked(old('institution')) required>
                                        <option value=""></option>
                                        <option @selected(old('institution') == 'APJII Member (ISP)') value="APJII Member (ISP)">
                                            APJII Member (ISP)
                                        </option>
                                        <option @selected(old('institution') == 'Regulator') value="Regulator">
                                            Regulator
                                        </option>
                                        <option @selected(old('institution') == 'Operator Data Center') value="Operator Data Center">
                                            Operator Data Center
                                        </option>
                                        <option @selected(old('institution') == 'Etc') value="Etc">Etc
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3" id="group_institution_etc">
                                    <label for="institution_etc">Institution Name</label>
                                    <input type="text" class="form-control" id="institution_etc" name="institution_etc"
                                        value="{{ old('institution_etc') }}" required disabled />
                                </div>
                                <div class="mb-3">
                                    <label for="handicap">Handicap</label>
                                    <input type="number" class="form-control" id="handicap" name="handicap" min="0"
                                        max="99" value="{{ old('handicap') }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="code">Compliment Code</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        value="{{ old('code') }}" required />
                                </div>
                                <div class="mb-3">
                                    <label>Polo Shirt Size</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="size_s" name="shirt_size"
                                            class="custom-control-input" value="S">
                                        <label class="custom-control-label" for="size_s">
                                            Size S
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="size_m" name="shirt_size"
                                            class="custom-control-input" value="M">
                                        <label class="custom-control-label" for="size_m">
                                            Size M
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="size_l" name="shirt_size"
                                            class="custom-control-input" value="L">
                                        <label class="custom-control-label" for="size_l">
                                            Size L
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="size_xl" name="shirt_size"
                                            class="custom-control-input" value="XL">
                                        <label class="custom-control-label" for="size_xl">
                                            Size XL
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="size_xxl" name="shirt_size"
                                            class="custom-control-input" value="XXL">
                                        <label class="custom-control-label" for="size_xxl">
                                            Size XXL
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-fw fa-save"></i> Save
                                </button>
                                <a href="{{ route('admin.tournament') }}" class="btn btn-secondary btn-block">
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

@section('skrip_jawa')
    <script>
        $(document).ready(() => {
            $('#institution').on('change', e => {
                console.log($('#institution').val())

                if ($('#institution').val() == "Etc") {
                    $('#institution_etc').prop('required', true).prop('disabled', false).val('');
                } else {
                    $('#institution_etc').prop('required', false).prop('disabled', true).val('');
                }
            })
        })
    </script>
@endsection
