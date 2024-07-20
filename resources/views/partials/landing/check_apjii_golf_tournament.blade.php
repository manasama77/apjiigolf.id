<section class="page-section bg-secondary" id="upcoming_event" style="min-height: 96vh;">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="row my-3">

                    <div class="col-sm-12 col-md-4 mx-auto mb-5">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Check Payment</h5>

                                <form action="{{ route('register_find') }}" method="post"">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="email@example.com" required />
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">Check</button>
                                </form>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
