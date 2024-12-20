<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 navbar-shrink" id="secondaryNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('PGA 2023.png') }}" class="img-fluid" style="max-width: 70px;" />
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link mt-0 mt-md-2" href="{{ route('home') }}#about">About PGA</a>
                </li>
                <li class="nav-item"><a class="nav-link mt-0 mt-md-2" href="{{ route('home') }}#event_list">Event
                        Highlight</a></li>
                <li class="nav-item"><a class="nav-link mt-0 mt-md-2 active"
                        href="{{ route('register_index') }}">Upcoming Event</a></li>
                <li class="nav-item">
                    <a class="nav-link mt-0 mt-md-2" href="{{ route('standings') }}">
                        Standings <i class="fa-solid fa-ranking-star ms-1"></i>
                    </a>
                </li>
                {{-- <li class="nav-item"><a class="btn btn-primary rounded-pill mt-3 mt-md-0 ms-md-2"
                        href="https://wa.me/{{ $wa_pic }}" target="_blank">Register
                        Now</a>
                </li> --}}
                {{-- <li class="nav-item"><a class="btn btn-primary rounded-pill mt-3 mt-md-0 ms-md-2"
                        href="{{ route('pairing') }}" target="_blank">
                        Pairing Table
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
