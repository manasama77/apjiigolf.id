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
                                <img src="{{ asset('apjii-golf-7/APJII Golf 7 - blue.png') }}"
                                    alt="APJII Golf Tournament 7" class="img-fluid mb-4" style="max-width: 90%" />
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
                                                        <span class="text">Rp{{ $member_price_idr }}
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
                                                    <small><i><span class="text-danger">*</span> Exclude Admin
                                                            Fee & Transfer Fee</i></small>
                                                </td>
                                            </tr>
                                        </tfoot> --}}
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
                                                <td class="text-start">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="word-art mb-0">
                                                                <span class="text">Rp{{ $member_price_idr }}
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
                                                    <small><i><span class="text-danger">*</span> Exclude Fee
                                                            Transfer</i></small>
                                                </td>
                                            </tr>
                                        </tfoot> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <iframe src="{{ $google_maps_embed }}" width="100%" height="450" style="border:0;"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="rounded border border-4 border-white shadow"></iframe>

                @if ($registration_status == true)
                    <a class="btn btn-primary btn-xl mt-3 shadow" href="{{ route('register_index') }}">
                        <i class="fa-solid fa-clipboard-user fa-fw"></i> Register Now!
                    </a>
                @else
                    <button type="button" class="btn btn-danger btn-xl mt-3 shadow disabled">Register
                        Closed</button>
                @endif

                <a class="btn btn-warning btn-xl mt-3 shadow" href="https://wa.me/{{ $wa_pic }}" target="_blank"
                    style="letter-spacing: 4px;">
                    <i class="fab fa-whatsapp fa-fw"></i> Need Help?
                </a>
                <br />
                {{-- <a class="btn btn-info btn-xl mt-3 shadow" href="{{ route('pairing') }}" target="_blank">
                    <i class="fas fa-table fa-fw"></i> Pairing Table
                </a> --}}
            </div>
        </div>
    </div>
</section>
