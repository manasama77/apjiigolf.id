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
                                <h1 class="card-title">{!! $event_name !!}</h1>
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
                                                        {{ $location_name }}<br />
                                                        {{ $location_address }}
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>
                                                        Registration Fee
                                                    </strong>
                                                    <br />
                                                    IDR {{ $ticket_price_idr }}<br />
                                                    Included:
                                                    <ul>
                                                        <li>Green Fee</li>
                                                        <li>Lunch & Dinner</li>
                                                        <li>VIP Room</li>
                                                        <li>Photographer</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
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
                                                    {{-- IDR {{ $ticket_price_idr }}<span class="text-danger">*</span> --}}
                                                    IDR {{ $ticket_price_idr }}
                                                    <br />
                                                    Included:<br />
                                                    <ul>
                                                        <li>Green Fee</li>
                                                        <li>Lunch & Dinner</li>
                                                        <li>VIP Room</li>
                                                        <li>Photographer</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
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
                                            </tr>
                                        </tbody>
                                        {{-- <tfoot>
                                            <tr>
                                                <td colspan="3" class="text-end">
                                                    <small><i><span class="text-danger">*</span> Exclude Admin
                                                            Fee</i></small>
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

                {{-- <a class="btn btn-warning btn-xl mt-3 shadow disabled" href="https://wa.me/628569016901"
                    target="_blank">Register
                    Closed</a> --}}
                {{-- <a class="btn btn-warning btn-xl mt-3 shadow" href="https://wa.me/{{ $wa_pic }}" target="_blank"
                    style="letter-spacing: 4px;">
                    Need Help?<br />
                    Contact Us <i class="fab fa-whatsapp fa-fw"></i>
                </a>
                <br /> --}}
                <a class="btn btn-primary btn-xl mt-3 shadow" href="{{ route('pairing') }}" target="_blank">
                    Pairing
                    Table
                </a>
            </div>
        </div>
    </div>
</section>
