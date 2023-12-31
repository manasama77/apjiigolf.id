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
                                <h1 class="card-title">{{ $location_name }}</h1>
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
                                                <td class="text-start">{{ $event_date->format('l, d F Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tee Off</td>
                                                <td>:</td>
                                                <td class="text-start">{{ $event_time }}</td>
                                            </tr>
                                            <tr>
                                                <td>Location Name</td>
                                                <td>:</td>
                                                <td class="text-start">{{ $location_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Location Address</td>
                                                <td>:</td>
                                                <td class="text-start">{{ $location_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Registration Fee</td>
                                                <td>:</td>
                                                <td class="text-start">
                                                    IDR {{ $ticket_price_idr }}<span class="text-danger">*</span>
                                                    <br />
                                                    Included:<br />
                                                    <ul>
                                                        <li>Green Fee</li>
                                                        <li>Whoosh Ticket</li>
                                                        <li>Snack & Lunch</li>
                                                        <li>Photographer</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" class="text-end">
                                                    <small><i><span class="text-danger">*</span> Exclude Admin
                                                            Fee</i></small>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.401231717722!2d107.441469!3d-6.8785849!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68fb0e7a9aea43%3A0xe9d37c463356b1d0!2sParahyangan%20Golf!5e0!3m2!1sen!2sid!4v1701974290784!5m2!1sen!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="rounded border border-4 border-white shadow"></iframe>

                <a class="btn btn-warning btn-xl mt-3 shadow disabled" href="https://wa.me/628569016901"
                    target="_blank">Register
                    Closed</a>
                <br />
                <a class="btn btn-primary btn-xl mt-3 shadow" href="{{ route('pairing') }}" target="_blank">
                    Pairing
                    Table
                </a>
            </div>
        </div>
    </div>
</section>
