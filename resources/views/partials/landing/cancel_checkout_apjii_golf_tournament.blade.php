<section class="page-section bg-secondary" id="upcoming_event" style="min-height: 95vh;">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="row my-3">

                    <div class="col-sm-12 col-md-8 offset-md-2 mb-5">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Payment Expired</h5>

                                <img src="{{ asset('undraw_season_change_f99v.svg') }}" alt="Payment Expired"
                                    class="img-fluid my-4" style="max-width: 300px;" />

                                <p>
                                    Transaction for invoice <b>{{ $reg->invoice_number }}</b> has been expired.
                                </p>

                                <a href="{{ route('register_index') }}" class="btn btn-primary">
                                    Would you like to try register again?
                                </a>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
