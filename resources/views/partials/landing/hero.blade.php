<header class="custom-padding">
    {{-- <img src="{{ asset('banner hero section.jpg') }}" alt="" class="img-fluid" /> --}}
    <a href="{{ route('register_index') }}">
        <picture>
            <source media="(min-width: 1199.98px)" srcset="{{ asset('banner-hero-section-desktop.jpg') }}">
            <source media="(min-width: 991.98px)" srcset="{{ asset('banner-hero-section-desktop.jpg') }}">
            <source media="(min-width: 767.98px)" srcset="{{ asset('banner-hero-section-mobile.jpg') }}">
            <source media="(min-width: 575.98px)" srcset="{{ asset('banner-hero-section-mobile.jpg') }}">
            <img src="{{ asset('banner-hero-section-mobile.jpg') }}" alt="" class="img-fluid" />
        </picture>
    </a>

    {{-- <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">
                    Welcome,<br />All PGA Members
                </h1>
                <hr class="divider divider-light" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <a class="btn btn-primary btn-xl shadow" href="#about">Find Out More</a>
            </div>
        </div>
    </div> --}}
</header>
