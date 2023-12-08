<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="PGA" />
    <meta name="author" content="@adampm from JLM" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name') }} - GOBAR Registration</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">

    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />

    @vite(['resources/css/register.css', 'resources/js/register.js'])
</head>

<body id="page-top">
    <!-- Navigation-->
    @include('partials.landing.navbar')

    <!-- Hero Section -->
    @include('partials.landing.hero')

    <!-- About Section-->
    @include('partials.landing.about')

    <!-- Event Info-->
    @include('partials.landing.event_list')

    <!-- Upcoming event-->
    @include('partials.landing.upcoming_event')


    <!-- Registration -->
    {{-- @include('partials.landing.form_registration') --}}
    {{-- @include('partials.landing.form_registration_plan_b') --}}

    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2023 - Persatuan Golf APJII (PGA)</div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
        integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(() => {
            $('#institution').on('change', e => {
                console.log($('#institution').val())

                if ($('#institution').val() == "Etc") {
                    $('#group_institution_etc').removeClass('d-none')
                    $('#institution_etc').prop('required', true)
                } else {
                    $('#group_institution_etc').addClass('d-none')
                    $('#institution_etc').prop('required', false)
                }
            })

            // $('#registration_form').on('submit', e => {
            //     e.preventDefault()
            //     registerApi()
            // })

            $('.grid').isotope({
                // options
                itemSelector: '.grid-item',
                layoutMode: 'fitRows'
            });

            // snap.pay("b6155c94-794e-4d46-84bc-2a053b4cb9c8");
        })

        function registerApi() {
            $.ajax({
                url: `{{ route('register_store') }}`,
                method: 'POST',
                dataType: 'json',
                data: {
                    full_name: $('#full_name').val(),
                    gender: $('#gender').val(),
                    email: $('#email').val(),
                    whatsapp_number: $('#whatsapp_number').val(),
                    company_name: $('#company_name').val(),
                    position: $('#position').val(),
                    institution: $('#institution').val(),
                    institution_etc: $('#institution_etc').val(),
                },
                beforeSend: () => {
                    $('#submitButton').prop('disabled', true)
                }
            }).fail(e => {
                console.log(e)
                Swal.fire({
                    title: "Something wrong",
                    text: e.responseJSON.message,
                    icon: "warning"
                }).then(() => {
                    $('#submitButton').prop('disabled', false)
                });
            }).done(e => {
                console.log(e)
                if (e.success) {
                    // console.log(e.snap_token)
                    snap.pay(e.snap_token, {
                        onSuccess: function(result) {
                            console.log(result);
                            Swal.fire({
                                icon: "success",
                                title: "Payment Success",
                                toast: true,
                                timer: 3000,
                                position: 'bottom-end',
                                showConfirmButton: false,
                            }).then(() => {
                                window.location.href =
                                    `{{ url(config('app.url')) }}/success?order_id=${e.data.order_id}`
                            });
                        },
                        onPending: function(result) {
                            console.log(result);
                            Swal.fire({
                                icon: "warning",
                                title: "Waiting Payment",
                                toast: true,
                                timer: 2000,
                                position: 'bottom-end',
                                showConfirmButton: false,
                            }).then(() => {
                                $('#submitButton').prop('disabled', false)
                            });
                        },
                        onError: function(result) {
                            console.log(result);
                            Swal.fire({
                                icon: "error",
                                title: "Payment Failed",
                                toast: true,
                                timer: 2000,
                                position: 'bottom-end',
                                showConfirmButton: false,
                            }).then(() => {
                                $('#submitButton').prop('disabled', false)
                            });
                        },
                        onClose: function() {
                            $('#submitButton').prop('disabled', false)
                        }
                    });

                } else {
                    $('#submitButton').prop('disabled', false)
                }
            })
        }
    </script>
</body>

</html>
