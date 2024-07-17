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
                                        <img src="{{ asset('apjii-golf-7/APJII Golf 6 - blue.png') }}"
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
                                                                {{ $location_name }}<br />
                                                                {{ $location_address }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4 class="fw-bold">
                                                                Registration Fee
                                                            </h4>
                                                            <img src="{{ asset('tiket-01.png') }}" alt="Earlybird Price"
                                                                class="img-fluid" />
                                                            <span class="fw-bold">Registration Period</span>
                                                            <p class="mb-5 fw-bold" style="font-size: 0.9rem">
                                                                {{ $early_bird_start }}
                                                                - {{ $early_bird_end }}
                                                            </p>

                                                            <img src="{{ asset('tiket-02.png') }}" alt="Reguler Price"
                                                                class="img-fluid" />
                                                            <span class="fw-bold">Registration Period</span>
                                                            <p class="fw-bold" style="font-size: 0.9rem">
                                                                {{ $reguler_start }} -
                                                                {{ $reguler_end }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="text-end">
                                                            <small><i><span class="text-danger">*</span> Exclude Admin
                                                                    Fee & Transfer Fee</i></small>
                                                        </td>
                                                    </tr>
                                                </tfoot>
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
                                                                {{ $location_name }}<br />
                                                                {{ $location_address }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Registration Fee</td>
                                                        <td>:</td>
                                                        <td>
                                                            <div class="row mx-0">
                                                                <div class="col-sm-12 col-md-6 text-center fw-bold">
                                                                    <img src="{{ asset('tiket-01.png') }}"
                                                                        alt="Early Bird Price" class="img-fluid" />
                                                                    <span>Registration Period</span>
                                                                    <p style="font-size: 0.9rem">
                                                                        {{ $early_bird_start }}
                                                                        - {{ $early_bird_end }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6 text-center fw-bold">
                                                                    <img src="{{ asset('tiket-02.png') }}"
                                                                        alt="Reguler Price" class="img-fluid" />
                                                                    <span>Registration Period</span>
                                                                    <p style="font-size: 0.9rem">{{ $reguler_start }} -
                                                                        {{ $reguler_end }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td>Payment Info</td>
                                                        <td>:</td>
                                                        <td class="text-start">
                                                            {{ $no_rekening }} <button type="button"
                                                                class="btn btn-secondary btn-sm" style="font-size: 10px;"
                                                                onclick="copyToClipboard('{{ $no_rekening }}')">
                                                                <i class="fas fa-copy"></i> Copy
                                                            </button> <br />
                                                            {{ $bank_rekening }}<br />
                                                            a/n {{ $nama_rekening }}
                                                        </td>
                                                    </tr> --}}
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="text-end">
                                                            <small><i><span class="text-danger">*</span> Registration
                                                                    Exclude Admin
                                                                    Fee & Transfer Fee</i></small>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        <iframe src="{{ $google_maps_embed }}" width="100%" height="350"
                                            style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"
                                            class="rounded border border-4 border-white shadow"></iframe>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-12 col-md-8 offset-md-2">
                        <form id="form" action="{{ route('register_store') }}" method="get">
                            @csrf

                            <div class="card bg-light">
                                <div class="card-body">
                                    <h2 class="text-center">Register Here!</h2>
                                    <hr class="divider" />
                                    <p class="text-muted mb-5">Experience the excitement of golf with PGA friends.</p>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li class="text-left fw-bold">{{ $error }}</li>
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
                                        <label for="email">Email address</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="whatsapp_number" name="whatsapp_number"
                                            type="tel" placeholder="08XXXXXXXXX"
                                            value="{{ old('whatsapp_number') }}" required />
                                        <label for="whatsapp_number">Phone number</label>
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

                                    <div class="floating mb-3">
                                        <div class="mb-2 d-flex flex-column align-items-center">
                                            <label for="ukuran_baju" class="form-label fw-bold fs-4"
                                                id="ukuran_baju_label">
                                                Choose Shirt Size
                                            </label>
                                            <div class="row">
                                                <div
                                                    class="col-sm-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center">
                                                    <input type="radio" class="btn-check" name="ukuran_baju"
                                                        id="size_s" value="S" autocomplete="off" />
                                                    <label
                                                        class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                        for="size_s">
                                                        <h5>S</h5>
                                                        <h6 class="small">
                                                            Width: 54cm<br />
                                                            Height: 70cm<br />
                                                            Sleeve: 23cm
                                                        </h6>
                                                    </label>
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-6 col-lg-4 mb-3  d-flex justify-content-center">
                                                    <input type="radio" class="btn-check" name="ukuran_baju"
                                                        id="size_m" value="M" autocomplete="off" />
                                                    <label
                                                        class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                        for="size_m">
                                                        <h5>M</h5>
                                                        <h6 class="small">
                                                            Width: 56cm<br />
                                                            Height: 72cm<br />
                                                            Sleeve: 24cm
                                                        </h6>
                                                    </label>
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-6 col-lg-4 mb-3  d-flex justify-content-center">
                                                    <input type="radio" class="btn-check" name="ukuran_baju"
                                                        id="size_l" value="L" autocomplete="off" />
                                                    <label
                                                        class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                        for="size_l">
                                                        <h5>L</h6>
                                                            <h6 class="small">
                                                                Width: 58cm<br />
                                                                Height: 74cm<br />
                                                                Sleeve: 26cm
                                                            </h6>
                                                    </label>
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-6 col-lg-4 mb-3  d-flex justify-content-center">
                                                    <input type="radio" class="btn-check" name="ukuran_baju"
                                                        id="size_xl" value="XL" autocomplete="off" />
                                                    <label
                                                        class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                        for="size_xl">
                                                        <h5>XL</h5>
                                                        <h6 class="small">
                                                            Width: 60cm<br />
                                                            Height: 76cm<br />
                                                            Sleeve: 27cm
                                                        </h6>
                                                    </label>
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-6 col-lg-4 mb-3  d-flex justify-content-center">
                                                    <input type="radio" class="btn-check" name="ukuran_baju"
                                                        id="size_xxl" value="XXL" autocomplete="off" />
                                                    <label
                                                        class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                        for="size_xxl">
                                                        <h5>XXL</h5>
                                                        <h6 class="small">
                                                            Width: 62cm<br />
                                                            Height: 78cm<br />
                                                            Sleeve: 28cm
                                                        </h6>
                                                    </label>
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-6 col-lg-4 mb-3  d-flex justify-content-center">
                                                    <input type="radio" class="btn-check" name="ukuran_baju"
                                                        id="size_3xl" value="3XL" autocomplete="off" />
                                                    <label
                                                        class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                        for="size_3xl">
                                                        <h5>3XL</h5>
                                                        <h6 class="small">
                                                            Width: 64cm<br />
                                                            Height: 80cm<br />
                                                            Sleeve: 30cm
                                                        </h6>
                                                    </label>
                                                </div>
                                                <!-- end -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    @if ($registration_status == true)
                                        <button type="submit" class="btn btn-primary  w-100 mt-3 shadow"
                                            style="letter-spacing: 2px;">
                                            <i class="fa-solid fa-clipboard-user fa-fw"></i> Register Now!
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-danger  w-100 mt-3 shadow disabled"
                                            style="letter-spacing: 2px;">Register
                                            Closed</button>
                                    @endif
                                    <a class="btn btn-warning mt-3 shadow w-100"
                                        href="https://wa.me/{{ $wa_pic }}" target="_blank"
                                        style="letter-spacing: 2px;">
                                        <i class="fab fa-whatsapp fa-fw"></i> Need Help?
                                    </a>
                                    <a class="btn btn-info w-100 mt-3 shadow" href="{{ route('pairing') }}"
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
