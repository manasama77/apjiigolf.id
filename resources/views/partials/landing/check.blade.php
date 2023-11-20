<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">PGA GOBAR <br />{{ $location_name }}<br />Check Payment Status
                </h1>
                <hr class="divider divider-light" />
            </div>
            <div class="col-lg-6 align-self-baseline">
                <form id="form" action="{{ route('register_status') }}" method="get">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" type="email"
                            placeholder="name@example.com" required />
                        <label for="email">Email address</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-xl shadow">Check now</button>
                </form>
            </div>
        </div>
    </div>
</header>
