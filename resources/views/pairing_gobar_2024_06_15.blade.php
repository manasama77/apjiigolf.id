<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>GOBAR PGA SERIES @BOGOR RAYA - PAIRING TABLE</title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.3.0/select2-bootstrap-5-theme.min.css"
        integrity="sha512-z/90a5SWiu4MWVelb5+ny7sAayYUfMmdXKEAbpj27PfdkamNdyI3hcjxPxkOPbrXoKIm7r9V2mElt5f1OtVhqA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        html,
        body {
            font-family: "Montserrat", sans-serif;
        }

        body {
            background-image: url("{{ asset('parahyangang_golf.webp') }}");
            background-size: cover;
            background-attachment: scroll;
            background-position: top center;
            background-repeat: repeat-y;
            min-height: 100vh;
        }

        .form-label {
            font-weight: bold;
        }

        .w-x-25 {
            width: 50% !important;
        }

        @media (max-width: 767.98px) {
            .w-x-25 {
                width: 75% !important;
            }
        }

        @media (max-width: 991.98px) {
            .w-x-25 {
                width: 100% !important;
            }
        }

        #sponsor {
            background-color: white !important;
        }
    </style>

    @vite([])
</head>

<body class="d-flex flex-column min-vh-100 dark" data-bs-theme="light">
    <div class="parallax"></div>
    <div class="container mt-3 mb-2">
        <div class="d-flex justify-content-center flex-column align-items-center">
            <img src="{{ asset('PGA 2023.png') }}" alt="PGA LOGO" class="img-fluid" style="max-width: 150px;" />
            <h1 class="fw-light my-5 text-center" style="color: #000">
                GOBAR PGA SERIES @BOGOR RAYA<br /><span class="fw-semibold">Pairing Table</span>
            </h1>
        </div>

        <div id="wrapper_pair_list" class="row mt-1 mb-1">
            <div class="col-sm-12">
                <div class="card border-dark shadow">
                    <div class="card-header bg-dark bg-gradient fw-bold text-center text-white">
                        <h5 style="font-weight: 600;" class="text-center">List Pairing 15 June 2024</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-12 col-md-6">
                                <div class="table-responsive">
                                    <table class="table-bordered mb-2 table">
                                        <thead>
                                            <tr>
                                                <th colspan=" 4" class="text-center">
                                                    Flight 1
                                                </th>
                                            </tr>
                                            <tr>
                                                <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 1%;">
                                                    No
                                                </th>
                                                <th class="text-center"
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Hole
                                                </th>
                                                <th style="background-color: #305496; color: white; font-weight: 700;">
                                                    Player Name</th>
                                                <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Gender
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td rowspan="4" class="fs-1 text-center align-middle">
                                                    -
                                                </td>
                                                <td>Victor Irianto</td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>John Sihar Simanjuntak
                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Suke Akbar
                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Eko Budhi

                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive mt-3">
                                    <table class="table-bordered mb-2 table">
                                        <thead>
                                            <tr>
                                                <th colspan=" 4" class="text-center">
                                                    Flight 2
                                                </th>
                                            </tr>
                                            <tr>
                                                <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 1%;">
                                                    No
                                                </th>
                                                <th class="text-center"
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Hole
                                                </th>
                                                <th style="background-color: #305496; color: white; font-weight: 700;">
                                                    Player Name</th>
                                                {{-- <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Gender
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td rowspan="4" class="fs-1 text-center align-middle">
                                                    -
                                                </td>
                                                <td>Agus Arianto

                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                {{-- <td>Roni Baskoro --}}

                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Ilham Efendi

                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Thai Thanh Long

                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive mt-3">
                                    <table class="table-bordered mb-2 table">
                                        <thead>
                                            <tr>
                                                <th colspan=" 4" class="text-center">
                                                    Flight 3
                                                </th>
                                            </tr>
                                            <tr>
                                                <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 1%;">
                                                    No
                                                </th>
                                                <th class="text-center"
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Hole
                                                </th>
                                                <th style="background-color: #305496; color: white; font-weight: 700;">
                                                    Player Name</th>
                                                {{-- <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Gender
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td rowspan="4" class="fs-1 text-center align-middle">
                                                    -
                                                </td>
                                                <td>Yudie Haryanto
                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Rizki T

                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Jimmy Kadir
                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Dani Samsul
                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="col-sm-12 col-md-6">

                                <div class="table-responsive mt-3 mt-md-0">
                                    <table class="table-bordered mb-2 table">
                                        <thead>
                                            <tr>
                                                <th colspan=" 4" class="text-center">
                                                    Flight 4
                                                </th>
                                            </tr>
                                            <tr>
                                                <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 1%;">
                                                    No
                                                </th>
                                                <th class="text-center"
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Hole
                                                </th>
                                                <th style="background-color: #305496; color: white; font-weight: 700;">
                                                    Player Name</th>
                                                {{-- <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Gender
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td rowspan="4" class="fs-1 text-center align-middle">
                                                    -
                                                </td>
                                                <td>Michael Alifen

                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Parlin Parlindungan

                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Huianto
                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td> Joni</td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive mt-3">
                                    <table class="table-bordered mb-2 table">
                                        <thead>
                                            <tr>
                                                <th colspan=" 4" class="text-center">
                                                    Flight 5
                                                </th>
                                            </tr>
                                            <tr>
                                                <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 1%;">
                                                    No
                                                </th>
                                                <th class="text-center"
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Hole
                                                </th>
                                                <th style="background-color: #305496; color: white; font-weight: 700;">
                                                    Player Name</th>
                                                {{-- <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Gender
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td rowspan="4" class="fs-1 text-center align-middle">
                                                    -
                                                </td>
                                                <td>Hery
                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                    Imam
                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Hendrik </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Januar</td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive mt-3">
                                    <table class="table-bordered mb-2 table">
                                        <thead>
                                            <tr>
                                                <th colspan=" 4" class="text-center">
                                                    Flight 6
                                                </th>
                                            </tr>
                                            <tr>
                                                <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 1%;">
                                                    No
                                                </th>
                                                <th class="text-center"
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Hole
                                                </th>
                                                <th style="background-color: #305496; color: white; font-weight: 700;">
                                                    Player Name</th>
                                                {{-- <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Gender
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td rowspan="4" class="fs-1 text-center align-middle">
                                                    -
                                                </td>
                                                <td>Michael T

                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Menkar

                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Glenn

                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Yanuar
                                                </td>
                                                {{-- <td>Male</td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                {{-- <div class="table-responsive mt-3">
                                    <table class="table-bordered mb-2 table">
                                        <thead>
                                            <tr>
                                                <th colspan=" 4" class="text-center">
                                                    Flight 7
                                                </th>
                                            </tr>
                                            <tr>
                                                <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 1%;">
                                                    No
                                                </th>
                                                <th class="text-center"
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Hole
                                                </th>
                                                <th style="background-color: #305496; color: white; font-weight: 700;">
                                                    Player Name</th>
                                                <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Gender
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td rowspan="4" class="fs-1 text-center align-middle">
                                                    -
                                                </td>
                                                <td>Meta </td>
                                                <td>Female</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>John Sihar S </td>
                                                <td>Male</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Priska </td>
                                                <td>Female</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Pak Kharisma </td>
                                                <td>Male</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive mt-3">
                                    <table class="table-bordered mb-2 table">
                                        <thead>
                                            <tr>
                                                <th colspan=" 4" class="text-center">
                                                    Flight 8
                                                </th>
                                            </tr>
                                            <tr>
                                                <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 1%;">
                                                    No
                                                </th>
                                                <th class="text-center"
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Hole
                                                </th>
                                                <th style="background-color: #305496; color: white; font-weight: 700;">
                                                    Player Name</th>
                                                <th
                                                    style="background-color: #305496; color: white; font-weight: 700; width: 15%;">
                                                    Gender
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td rowspan="4" class="fs-1 text-center align-middle">
                                                    -
                                                </td>
                                                <td>Yudi Imanuel </td>
                                                <td>Male</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Ilham Akbar </td>
                                                <td>Male</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Novel </td>
                                                <td>Male</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Wawan </td>
                                                <td>Male</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> --}}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <footer class="d-flex justify-content-center border-top my-4 flex-wrap pt-3">
            <div class="col-8 d-flex align-items-center">
                <a href="/" class="mb-md-0 text-muted text-decoration-none lh-1 mb-3 me-2">
                    <img src="{{ asset('PGA_2023_white.png') }}" style="width: 40px" alt="Logo PGA" />
                </a>
                <span class="mb-md-0 mb-3 text-white fw-bold">
                    © Copyright 2024. Persatuan Golf APJII.
                </span>
            </div>

            <ul class="nav col-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3">
                    <a href="https://www.facebook.com/profile.php?id=100078846007523" target="_blank"
                        class="text-white">
                        <i class="fab fa-facebook-f fw-bold"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a href="https://www.instagram.com/apjii/" target="_blank" class="text-white">
                        <i class="fab fa-instagram fw-bold"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a href="https://www.youtube.com/channel/UC-PJ7U_CUfA0dzwMXvFm6ag" target="_blank"
                        class="text-white">
                        <i class="fab fa-youtube fw-bold"></i>
                    </a>
                </li>
            </ul>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"
        integrity="sha512-eYSzo+20ajZMRsjxB6L7eyqo5kuXuS2+wEbbOkpaur+sA2shQameiJiWEzCIDwJqaB0a4a6tCuEvCOBHUg3Skg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script></script>
</body>

</html>
