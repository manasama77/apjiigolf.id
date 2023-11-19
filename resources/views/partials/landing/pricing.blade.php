<section class="page-section" id="ticket_pricing">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Ticket Pricing</h2>
        <hr class="divider divider-primary" />

        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <div class="card">
                    <div class="card-header bg-primary"></div>
                    <div class="card-body text-center">
                        <h1>IDR {{ $ticket_price_idr }}<span class="text-danger">*</span></h1>
                        <p>Admin fee: IDR {{ $admin_fee_idr }}</p>
                    </div>
                    <div class="card-footer bg-primary text-white fst-italic">
                        *exclude admin & transfer fee
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a class="btn btn-primary btn-xl shadow" href="#registration">Join Now!</a>
        </div>

    </div>
</section>
