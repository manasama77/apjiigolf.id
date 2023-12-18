@extends('layouts.event_highlight')

@section('aku_isi_mas')
    <section class="page-section mt-5" id="highlight_gobar_1">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-12 text-center">
                    <h2 class="text-center mt-0">{{ $page_title }}</h2>
                    <hr class="divider divider-light" />
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="gallery">
                                @for ($i = 1; $i <= 105; $i++)
                                    <a href="{{ asset('events/GOBAR 3 (Parahyangan Golf)/5/GOBAR_AT_PARAHYANGAN_GOLF (' . $i . ').JPG') }}"
                                        data-lightbox="gobar-1">
                                        <img src="{{ asset('events/GOBAR 3 (Parahyangan Golf)/5/thumb/GOBAR_AT_PARAHYANGAN_GOLF (' . $i . ').JPG') }}"
                                            alt="" title="" class="img-thumbnail" loading="lazy" />
                                    </a>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-5 d-flex justify-content-center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="{{ route('gobar_3_4') }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="{{ route('gobar_3_1') }}">1</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ route('gobar_3_2') }}">2</a></li>
                                    <li class="page-item "><a class="page-link" href="{{ route('gobar_3_3') }}">3</a></li>
                                    <li class="page-item active"><a class="page-link" href="{{ route('gobar_3_5') }}">4</a>
                                    <li class="page-item"><a class="page-link" href="#">5</a>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
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
@endsection
