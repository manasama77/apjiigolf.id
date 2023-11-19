<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">APJII Golf - {{ $location_name }}<br />Registration</h1>
                <hr class="divider divider-light" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white mb-5">Apjii Golf series will be held at {{ $location_name }} on
                    {{ $event_date->format('d F Y') }}. Be sure
                    participate in the event to get a chance to win the event. </p>
                <a class="btn btn-primary btn-xl shadow" href="#event_info">Find Out More</a>
            </div>
        </div>
    </div>
</header>
