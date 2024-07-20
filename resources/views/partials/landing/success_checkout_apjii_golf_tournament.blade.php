<section class="page-section bg-secondary" id="upcoming_event">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="row my-3">

                    <div class="col-sm-12 col-md-8 offset-md-2 mb-5">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Payment Success</h5>

                                <img src="{{ asset('undraw_confirmed_re_sef7.svg') }}" alt="Payment Success"
                                    class="img-fluid my-4" style="max-width: 300px;" />

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Invoice Number</th>
                                                <th>{{ $reg->invoice_number }}</th>
                                            </tr>
                                            <tr>
                                                <th>Name</th>
                                                <th>{{ $reg->full_name }}</th>
                                            </tr>
                                            <tr>
                                                <th>Polo Shirt Size</th>
                                                <th>{{ $reg->shirt_size }}</th>
                                            </tr>
                                            <tr>
                                                <th>Ticket</th>
                                                <th>{{ $event_name }}</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <a href="{{ route('register_download_eticket', $reg->id) }}" class="btn btn-primary"
                                    target="_blank">
                                    <i class="fas fa-file-pdf fa-fw"></i> Download E-ticket
                                </a>

                            </div>
                        </div>

                    </div>

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
                                                                {{ $location_name }}<br />
                                                                {{ $location_address }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
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
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <iframe src="{{ $google_maps_embed }}" width="100%" height="350"
                                                    style="border:0; width: 100%; height: 350px;" allowfullscreen=""
                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                                    class="rounded border border-4 border-white shadow"></iframe>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
