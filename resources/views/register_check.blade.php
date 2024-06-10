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
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
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
    @include('partials.landing.navbar_2')

    <!-- Hero Section -->
    @include('partials.landing.check')

    <!-- Event Info-->
    {{-- @include('partials.landing.event_info') --}}

    <!-- Ticket pricing-->
    {{-- @include('partials.landing.pricing') --}}


    <!-- Registration -->
    {{-- @include('partials.landing.registration') --}}

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

            $('#registration_form').on('submit', e => {
                e.preventDefault()
                registerApi()
            })

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
                $('#submitButton').prop('disabled', false)
            }).done(e => {
                console.log(e)
                if (e.success) {
                    // console.log(e.snap_token)
                    snap.pay(e.snap_token);
                    // window.location.href = `{{ url('/register_status') }}/${e.data.order_id}`
                } else {
                    $('#submitButton').prop('disabled', false)
                }
            })
        }
    </script>
</body>

</html>
