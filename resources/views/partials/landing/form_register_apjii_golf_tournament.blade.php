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
                                                                <span class="text">Rp{{ $early_price_idr }}<sup
                                                                        class="text-danger">*</sup>
                                                                </span>
                                                            </p>
                                                            <p class="text-center fw-bold">APJII Member</p>
                                                            <p class="word-art text-center mb-0">
                                                                <span class="text">Rp{{ $reguler_price_idr }}<sup
                                                                        class="text-danger">*</sup>
                                                                </span>
                                                            </p>
                                                            <p class="text-center fw-bold">Regular</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="text-end">
                                                            <small><i><span class="text-danger">*</span> Exclude
                                                                    Transfer Fee</i></small>
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
                                                                        <span
                                                                            class="text">Rp{{ $early_price_idr }}<sup
                                                                                class="text-danger">*</sup>
                                                                        </span>
                                                                    </p>
                                                                    <p class="text-center fw-bold">APJII Member</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="word-art mb-0">
                                                                        <span
                                                                            class="text">Rp{{ $reguler_price_idr }}<sup
                                                                                class="text-danger">*</sup>
                                                                        </span>
                                                                    </p>
                                                                    <p class="text-center fw-bold">Regular</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="text-end">
                                                            <small><i><span class="text-danger">*</span> Registration
                                                                    Exclude Transfer Fee</i></small>
                                                        </td>
                                                    </tr>
                                                </tfoot>
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
                                <div class="card-body">
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
                                        If you are a member of APJII, please <a href="{{ $wa_pic }}"><i
                                                class="fab fa-whatsapp"></i> contact us</a> to get a special promo
                                    </p>

                                    <div class="row mb-3 justify-content-center">
                                        <div class="col-12">
                                            <h1>Choose Your Polo Shirt Size</h1>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center">
                                            <input type="radio" class="btn-check" name="shirt_size" id="size_xs"
                                                value="XS" autocomplete="off" />
                                            <label class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                for="size_xs">
                                                <h5>XS</h5>
                                                <h6 class="small">
                                                    Chest: 81-87 CM<br />
                                                    {{-- Waist: 68-74 CM<br />
                                                    Seat: 85-91 CM<br /> --}}
                                                    Arm Length: 62 CM<br />
                                                </h6>
                                            </label>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center">
                                            <input type="radio" class="btn-check" name="shirt_size" id="size_s"
                                                value="S" autocomplete="off" />
                                            <label class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                for="size_s">
                                                <h5>S</h5>
                                                <h6 class="small">
                                                    Chest: 87-93 CM<br />
                                                    {{-- Waist: 74-80 CM<br />
                                                    Seat: 91-97 CM<br /> --}}
                                                    Arm Length: 63.5 CM<br />
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
                                                    Chest: 93-99 CM<br />
                                                    {{-- Waist: 80-86 CM<br />
                                                    Seat: 97-103 CM<br /> --}}
                                                    Arm Length: 65 CM<br />
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
                                                    Chest: 99-105 CM<br />
                                                    {{-- Waist: 86-92 CM<br />
                                                    Seat: 103-109 CM<br /> --}}
                                                    Arm Length: 66.5 CM<br />
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
                                                    Chest: 105-111 CM<br />
                                                    {{-- Waist: 92-98 CM<br />
                                                    Seat: 109-115 CM<br /> --}}
                                                    Arm Length: 68 CM<br />
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
                                                    Chest: 111-117 CM<br />
                                                    {{-- Waist: 98-104 CM<br />
                                                    Seat: 115-121 CM<br /> --}}
                                                    Arm Length: 69.5 CM<br />
                                                </h6>
                                            </label>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center">
                                            <input type="radio" class="btn-check" name="shirt_size" id="size_xxxl"
                                                value="XXXL" autocomplete="off" />
                                            <label class="btn btn-outline-primary border-primary w-100 shadow-sm"
                                                for="size_xxxl">
                                                <h5>XXXL</h5>
                                                <h6 class="small">
                                                    Chest: 117-123 CM<br />
                                                    {{-- Waist: 104-110 CM<br />
                                                    Seat: 121-127 CM<br /> --}}
                                                    Arm Length: 71 CM<br />
                                                </h6>
                                            </label>
                                        </div>

                                    </div>

                                    {{-- <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Size Guidance
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>SIZE<br /><small class="text-muted">EU</small></th>
                                                                            <th>CHEST<br /><small class="text-muted">CM</small></th>
                                                                            <th>WAIST<br /><small class="text-muted">CM</small></th>
                                                                            <th>SEAT<br /><small class="text-muted">CM</small></th>
                                                                            <th>ARM LENGTH<br /><small class="text-muted">CM</small></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>XS</th>
                                                                            <td>81-87</td>
                                                                            <td>66-74</td>
                                                                            <td>85-91</td>
                                                                            <td>62</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>S</th>
                                                                            <td>87-93</td>
                                                                            <td>74-80</td>
                                                                            <td>91-97</td>
                                                                            <td>63.5</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>M</th>
                                                                            <td>93-99</td>
                                                                            <td>80-86</td>
                                                                            <td>91-103</td>
                                                                            <td>65</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>L</th>
                                                                            <td>99-105</td>
                                                                            <td>86-92</td>
                                                                            <td>103-109</td>
                                                                            <td>66.5</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>XL</th>
                                                                            <td>105-111</td>
                                                                            <td>92-98</td>
                                                                            <td>109-115</td>
                                                                            <td>68</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>XXL</th>
                                                                            <td>111-117</td>
                                                                            <td>98-104</td>
                                                                            <td>115-121</td>
                                                                            <td>69.5</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>XXXL</th>
                                                                            <td>117-123</td>
                                                                            <td>104-110</td>
                                                                            <td>121-127</td>
                                                                            <td>71</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <img src="https://www.jlindeberg.com/cdn/shop/t/225/assets/size-guide.webp?v=182594139253300845431719414016" alt="Size Guidance" class="img-fluid" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

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
