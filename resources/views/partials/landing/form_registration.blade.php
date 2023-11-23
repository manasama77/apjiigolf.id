<section class="page-section bg-dark" id="registration">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0 text-white">Register Here!</h2>
                <hr class="divider" />
                <p class="text-muted mb-5">Experience the excitement of golf with PGA friends.</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-3">
            <div class="col-lg-6">
                <form id="registration_form">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="full_name" name="full_name" type="text"
                            placeholder="Enter your full name..." autocomplete="name" required />
                        <label for="full_name">Full name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <label for="gender">Gender</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" placeholder="name@example.com"
                            required />
                        <label for="email">Email address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="whatsapp_number" name="whatsapp_number" type="tel"
                            placeholder="08XXXXXXXXX" required />
                        <label for="whatsapp_number">Phone number</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="company_name" name="company_name" type="text"
                            placeholder="Enter your company name" required />
                        <label for="company_name">Company Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" id="position" name="position" required>
                            <option value=""></option>
                            <option value="Commissioner">Commissioner</option>
                            <option value="C Level">C Level</option>
                            <option value="Vice President">Vice President</option>
                            <option value="General Manager">General Manager</option>
                            <option value="Manager - Senior Manager">Manager - Senior Manager
                            </option>
                            <option value="Staff - Supervisor">Staff - Supervisor</option>
                        </select>
                        <label for="position">Position</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" id="institution" name="institution" required>
                            <option value=""></option>
                            <option value="APJII Member (ISP)">
                                APJII Member (ISP)
                            </option>
                            <option value="Regulator">Regulator</option>
                            <option value="Operator Data Center">
                                Operator Data Center
                            </option>
                            <option value="Etc">Etc</option>
                        </select>
                        <label for="institution">Institution</label>
                    </div>

                    <div id="group_institution_etc" class="form-floating mb-3 d-none">
                        <input class="form-control" id="institution_etc" name="institution_etc" type="text"
                            placeholder="Institution Name" />
                        <label for="institution_etc">Institution Name</label>
                    </div>

                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a
                                href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>

                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Error sending message!</div>
                    </div>
                    <!-- Submit Button-->
                    <div class="d-grid">
                        <button class="btn btn-primary btn-xl my-3" id="submitButton" type="submit"
                            disabled>Submit</button>
                        <a href="{{ route('register_check') }}" class="btn btn-secondary btn-xl my-3">Already pay? Check
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
