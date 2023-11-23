<section class="page-section bg-secondary" id="upcoming_event">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="text-white text-center mt-0">Upcoming Event</h2>
                <hr class="divider divider-light" />
                <div class="row my-3">
                    <div class="col-sm-12 col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="table-responsive d-block d-md-none">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td style="width: 200px;">
                                                    <strong>
                                                        Date
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
                                                        Location Name
                                                    </strong>
                                                    <br />
                                                    {{ $location_name }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <strong>
                                                        Location Address
                                                    </strong>
                                                    <br />
                                                    {{ $location_address }}
                                                </td>
                                            </tr </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive d-none d-md-block d-lg-block d-xl-block">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td style="width: 200px;">Date</td>
                                                <td style="width: 10px">:</td>
                                                <td>{{ $event_date->format('l, d F Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tee Off</td>
                                                <td>:</td>
                                                <td>{{ $event_time }}</td>
                                            </tr>
                                            <tr>
                                                <td>Location Name</td>
                                                <td>:</td>
                                                <td>{{ $location_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Location Address</td>
                                                <td>:</td>
                                                <td>{{ $location_address }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2394.0708951733527!2d106.82919858952151!3d-6.597132651388837!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c6701f58fdbd%3A0x2dee2253e078277e!2sClub%20Bogor%20Raya!5e0!3m2!1sen!2sid!4v1699820500794!5m2!1sen!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="true" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="rounded border border-4 border-white shadow"></iframe>

                <a class="btn btn-light btn-xl mt-3 shadow" href="#registration">Register Now</a>
            </div>
        </div>
    </div>
</section>
