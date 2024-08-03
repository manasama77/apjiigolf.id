<section class="page-section bg-secondary" id="upcoming_event">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="row my-3">

                    <div class="col-sm-12 col-md-8 offset-md-2">

                        <div class="accordion mb-5" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Tournament Information
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <img src="{{ asset('apjii-golf-7/APJII Golf 7 - blue.png') }}"
                                            alt="APJII Golf Tournament 7" class="img-fluid mb-4"
                                            style="max-width: 90%" />

                                        <div class="table-responsive d-block d-md-none">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 200px;">
                                                            <strong>
                                                                Event Date
                                                            </strong>
                                                            <br />
                                                            {{ $event_date->format('l, d F Y') }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>
                                                                Tee Off
                                                            </strong>
                                                            <br />
                                                            {{ $event_time }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>
                                                                Locations
                                                            </strong>
                                                            <br />
                                                            <a href="{{ $google_maps_url }}" target="_blank">
                                                                {{ $location_name }}
                                                                {{-- <br />
                                                                {{ $location_address }} --}}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4 class="fw-bold">
                                                                Registration Fee
                                                            </h4>
                                                            <p class="word-art text-center mb-0">
                                                                <span class="text">Rp{{ $early_price_idr }}
                                                                    {{-- <sup class="text-danger">*</sup> --}}
                                                                </span>
                                                            </p>
                                                            <p class="text-center fw-bold">APJII Member</p>
                                                            <p class="word-art text-center mb-0">
                                                                <span class="text">Rp{{ $reguler_price_idr }}
                                                                    {{-- <sup class="text-danger">*</sup> --}}
                                                                </span>
                                                            </p>
                                                            <p class="text-center fw-bold">Regular</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                {{-- <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="text-end">
                                                            <small><i><span class="text-danger">*</span> Exclude
                                                                    Transfer Fee</i></small>
                                                        </td>
                                                    </tr>
                                                </tfoot> --}}
                                            </table>
                                        </div>

                                        <div class="table-responsive d-none d-md-block d-lg-block d-xl-block">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 200px;">Event Date</td>
                                                        <td style="width: 10px">:</td>
                                                        <td class="text-start">{{ $event_date->format('l, d F Y') }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tee Off</td>
                                                        <td>:</td>
                                                        <td class="text-start">{{ $event_time }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Location</td>
                                                        <td>:</td>
                                                        <td class="text-start">
                                                            <a href="{{ $google_maps_url }}">
                                                                {{ $location_name }}
                                                                {{-- <br />
                                                                {{ $location_address }} --}}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Registration Fee</td>
                                                        <td>:</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="word-art mb-0">
                                                                        <span class="text">Rp{{ $early_price_idr }}
                                                                            {{-- <sup class="text-danger">*</sup> --}}
                                                                        </span>
                                                                    </p>
                                                                    <p class="text-center fw-bold">APJII Member</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="word-art mb-0">
                                                                        <span class="text">Rp{{ $reguler_price_idr }}
                                                                            {{-- <sup class="text-danger">*</sup> --}}
                                                                        </span>
                                                                    </p>
                                                                    <p class="text-center fw-bold">Regular</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                {{-- <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="text-end">
                                                            <small><i><span class="text-danger">*</span> Registration
                                                                    Exclude Transfer Fee</i></small>
                                                        </td>
                                                    </tr>
                                                </tfoot> --}}
                                            </table>
                                        </div>

                                        {{-- <iframe src="{{ $google_maps_embed }}" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded border border-4 border-white shadow"></iframe> --}}

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-sm-12 col-md-8 offset-md-2 mb-5">
                        <form id="form" action="{{ route('register_store') }}" method="post">
                            @csrf

                            <div class="card bg-light">
                                <div class="card-body bg-white">
                                    <h2 class="text-center">Register Here!</h2>
                                    <hr class="divider" />
                                    <p class="text-muted mb-5">Experience the excitement of golf with PGA friends.</p>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li class="text-start fw-bold">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="full_name" name="full_name" type="text"
                                            placeholder="Enter your full name..." autocomplete="name"
                                            value="{{ old('full_name') }}" required />
                                        <label for="full_name">Full name</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option @selected(old('gender') == 'male') value="male">Male</option>
                                            <option @selected(old('gender') == 'female') value="female">Female</option>
                                        </select>
                                        <label for="gender">Gender</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email"
                                            placeholder="name@example.com" value="{{ old('email') }}" required />
                                        <label for="email">Email Address</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="whatsapp_number" name="whatsapp_number"
                                            type="tel" placeholder="08XXXXXXXXX"
                                            value="{{ old('whatsapp_number') }}" required />
                                        <label for="whatsapp_number">Phone number / Mobile number</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="company_name" name="company_name"
                                            type="text" placeholder="Enter your company name"
                                            value="{{ old('company_name') }}" required />
                                        <label for="company_name">Company Name</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="position" name="position" required>
                                            <option value=""></option>
                                            <option @selected(old('position') == 'Commissioner') value="Commissioner">Commissioner
                                            </option>
                                            <option @selected(old('position') == 'C Level') value="C Level">C Level</option>
                                            <option @selected(old('position') == 'Vice President') value="Vice President">Vice President
                                            </option>
                                            <option @selected(old('position') == 'General Manager') value="General Manager">General
                                                Manager
                                            </option>
                                            <option @selected(old('position') == 'Manager - Senior Manager') value="Manager - Senior Manager">
                                                Manager -
                                                Senior
                                                Manager
                                            </option>
                                            <option @selected(old('position') == 'Staff - Supervisor') value="Staff - Supervisor">Staff -
                                                Supervisor
                                            </option>
                                        </select>
                                        <label for="position">Position</label>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="institution" name="institution"
                                                    required>
                                                    <option value=""></option>
                                                    <option @selected(old('institution') == 'APJII Member (ISP)') value="APJII Member (ISP)">
                                                        APJII Member (ISP)
                                                    </option>
                                                    <option @selected(old('institution') == 'Regulator') value="Regulator">Regulator
                                                    </option>
                                                    <option @selected(old('institution') == 'Operator Data Center') value="Operator Data Center">
                                                        Operator Data Center
                                                    </option>
                                                    <option @selected(old('institution') == 'Etc') value="Etc">Etc</option>
                                                </select>
                                                <label for="institution">Institution</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div id="group_institution_etc" class="form-floating mb-3">
                                                <input class="form-control disabled" id="institution_etc"
                                                    name="institution_etc" type="text"
                                                    placeholder="Institution Name"
                                                    value="{{ old('institution_etc') }}"
                                                    {{ old('institution') == 'Etc' ? 'required' : 'disabled' }} />
                                                <label for="institution_etc">Institution Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="code" name="code" type="text"
                                            placeholder="Have Promo Code" value="{{ old('code') }}" />
                                        <label for="code">Promo Code</label>
                                    </div>
                                    <p class="text-muted text-start mb-5">
                                        For APJII members, <a href="{{ $wa_pic }}">contact us</a> to get special
                                        price.
                                    </p>

                                    <div class="row mb-3 justify-content-center">
                                        <div class="col-12">
                                            <h1>Choose Your Polo Shirt Size</h1>
                                        </div>

                                        <div class="col-12 justify-content-center">
                                            <img src="{{ asset('PG Logo.jpg') }}" alt="PG Logo"
                                                class="img-fluid mb-3" />
                                        </div>
                                        <div class="col-12 justify-content-center">
                                            <img src="{{ asset('size-chart.jpg') }}" alt="Size Chart"
                                                class="img-fluid mb-3" style="max-width: 300px;" />
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center">
                                            <input type="radio" class="btn-check" name="shirt_size" id="size_s"
                                                value="S" autocomplete="off" />
                                            <label class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                for="size_s">
                                                <h5>S</h5>
                                                <h6 class="small">
                                                    Length: 71 CM<br />
                                                    Width: 48 CM<br />
                                                    Sleeve: 23,5 CM<br />
                                                </h6>
                                            </label>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center">
                                            <input type="radio" class="btn-check" name="shirt_size" id="size_m"
                                                value="M" autocomplete="off" />
                                            <label class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                for="size_m">
                                                <h5>M</h5>
                                                <h6 class="small">
                                                    Length: 73,5 CM<br />
                                                    Width: 51 CM<br />
                                                    Sleeve: 24 CM<br />
                                                </h6>
                                            </label>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center">
                                            <input type="radio" class="btn-check" name="shirt_size" id="size_l"
                                                value="L" autocomplete="off" />
                                            <label class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                for="size_l">
                                                <h5>L</h5>
                                                <h6 class="small">
                                                    Length: 76 CM<br />
                                                    Width: 52,5 CM<br />
                                                    Sleeve: 24,5 CM<br />
                                                </h6>
                                            </label>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center">
                                            <input type="radio" class="btn-check" name="shirt_size" id="size_xl"
                                                value="XL" autocomplete="off" />
                                            <label class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                for="size_xl">
                                                <h5>XL</h5>
                                                <h6 class="small">
                                                    Length: 79,5 CM<br />
                                                    Width: 55 CM<br />
                                                    Sleeve: 24,5 CM<br />
                                                </h6>
                                            </label>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center">
                                            <input type="radio" class="btn-check" name="shirt_size" id="size_xxl"
                                                value="XXL" autocomplete="off" />
                                            <label class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                for="size_xxl">
                                                <h5>XXL</h5>
                                                <h6 class="small">
                                                    Length: 80 CM<br />
                                                    Width: 59 CM<br />
                                                    Sleeve: 25,5 CM<br />
                                                </h6>
                                            </label>
                                        </div>

                                    </div>

                                </div>

                                <div class="card-footer">
                                    {!! RecaptchaV3::field('register') !!}
                                    @if ($registration_status == true)
                                        <button id="btn_submit" type="submit"
                                            class="btn btn-primary w-100 mt-3 shadow" style="letter-spacing: 2px;">
                                            <i class="fa-solid fa-clipboard-user fa-fw"></i> Register Now!
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-danger w-100 mt-3 shadow disabled"
                                            style="letter-spacing: 2px;">Register
                                            Closed</button>
                                        <button class="g-recaptcha" data-sitekey="reCAPTCHA_site_key"
                                            data-callback='onSubmit' data-action='submit'>Submit</button>
                                    @endif
                                    <a class="btn btn-warning mt-3 shadow w-100"
                                        href="https://wa.me/{{ $wa_pic }}" target="_blank"
                                        style="letter-spacing: 2px;">
                                        <i class="fab fa-whatsapp fa-fw"></i> Need Help?
                                    </a>
                                    <a class="btn btn-info w-100 mt-3 shadow" href="{{ route('register_check') }}"
                                        style="letter-spacing: 2px;">
                                        <i class="fas fa-table fa-fw"></i> Check Payment
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
