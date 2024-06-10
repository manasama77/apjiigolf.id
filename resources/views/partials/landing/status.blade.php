<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">PGA GOBAR <br />{{ $location_name }}<br />Registration Status
                </h1>
                <hr class="divider divider-light" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                @if ($payment_status == 0)
                    <h2 class="text-white mb-5">
                        Your payment registration still <div class="badge bg-warning">unpaid</div>
                    </h2>
                    <button type="button" class="btn btn-primary btn-xl shadow" id="btn_pay"
                        data-snap_token="{{ $snap_token }}">Pay now</button>
                @elseif($payment_status == 1)
                    <h2 class="text-white mb-5">
                        Your payment registration already
                        <div class="badge bg-success">completed</div>
                    </h2>
                    <a href="#" class="btn btn-success btn-xl shadow">Download E-ticket</a>
                @elseif($payment_status == 2)
                    <h2 class="text-white mb-5">
                        Your payment registration already <div class="badge bg-danger">expired</div>
                    </h2>
                    <a href="{{ url('/#registration') }}" class="btn btn-warning btn-xl shadow">Register Again?</a>
                @endif

                <div class="text-center mt-3">
                    <a class="btn btn-warning btn-xl shadow-sm" href="https://wa.me/628569016901" target="_blank">
                        <i class="fab fa-whatsapp fa-fw"></i> Have a Question?
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
