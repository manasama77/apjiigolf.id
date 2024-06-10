<section class="page-section mt-5" id="highlight_gobar_1">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="text-center mt-0">APJII GOLF 6</h2>
                <hr class="divider divider-light" />
                <div class="row">
                    <div class="col-sm-12">
                        <div class="gallery">
                            @for ($i = 1; $i <= 18; $i++)
                                <a href="{{ asset('events/APJII Golf 6 (2023)/APJIIGOLF6 (' . $i . ').JPG') }}"
                                    data-lightbox="gobar-1">
                                    <img src="{{ asset('events/APJII Golf 6 (2023)/APJIIGOLF6 (' . $i . ').JPG') }}"
                                        alt="" title="" class="img-thumbnail" loading="lazy" />
                                </a>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-info btn-xl mt-5 shadow" href="{{ route('home') }}#event_list">Back to
                            List</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
