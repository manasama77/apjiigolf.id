<section class="page-section bg-dark" id="registration">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0 text-white">Register Here!</h2>
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
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-3">
            <div class="col-lg-6">
                <form id="registration_form" action="{{ route('register_store') }}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="full_name" name="full_name" type="text"
                            placeholder="Enter your full name..." autocomplete="name" value="{{ old('full_name') }}"
                            required />
                        <label for="full_name">Full name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" id="gender" name="gender" required>
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
                        <input class="form-control" id="whatsapp_number" name="whatsapp_number" type="tel"
                            placeholder="08XXXXXXXXX" value="{{ old('whatsapp_number') }}" required />
                        <label for="whatsapp_number">Phone number</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="company_name" name="company_name" type="text"
                            placeholder="Enter your company name" value="{{ old('company_name') }}" required />
                        <label for="company_name">Company Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" id="position" name="position" required>
                            <option value=""></option>
                            <option @selected(old('position') == 'Commissioner') value="Commissioner">Commissioner</option>
                            <option @selected(old('position') == 'C Level') value="C Level">C Level</option>
                            <option @selected(old('position') == 'Vice President') value="Vice President">Vice President</option>
                            <option @selected(old('position') == 'General Manager') value="General Manager">General Manager</option>
                            <option @selected(old('position') == 'Manager - Senior Manager') value="Manager - Senior Manager">Manager - Senior
                                Manager
                            </option>
                            <option @selected(old('position') == 'Staff - Supervisor') value="Staff - Supervisor">Staff - Supervisor</option>
                        </select>
                        <label for="position">Position</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" id="institution" name="institution" required>
                            <option value=""></option>
                            <option @selected(old('institution') == 'APJII Member (ISP)') value="APJII Member (ISP)">
                                APJII Member (ISP)
                            </option>
                            <option @selected(old('institution') == 'Regulator') value="Regulator">Regulator</option>
                            <option @selected(old('institution') == 'Operator Data Center') value="Operator Data Center">
                                Operator Data Center
                            </option>
                            <option @selected(old('institution') == 'Etc') value="Etc">Etc</option>
                        </select>
                        <label for="institution">Institution</label>
                    </div>

                    <div id="group_institution_etc"
                        class="form-floating mb-3 @php(old('institution') == 'Etc') ? 'd-block' : 'd-none' @endphp ">
                        <input class="form-control" id="institution_etc" name="institution_etc" type="text"
                            placeholder="Institution Name" value="{{ old('institution_etc') }}"
                            @php(old('institution') == 'Etc') ? 'required' : '' @endphp />
                        <label for="institution_etc">Institution Name</label>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary btn-xl my-3" id="submitButton" type="submit">Submit</button>
                        <a href="{{ route('register_check') }}" class="btn btn-secondary btn-xl my-3">Already pay?
                            Check
                            your
                            payment status</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-warning btn-xl shadow-sm" href="https://wa.me/628569016901" target="_blank">
                <i class="fab fa-whatsapp fa-fw"></i> Have a Question?
            </a>
        </div>
    </div>
</section>
