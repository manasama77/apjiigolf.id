<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>APJII 6ᵗʰ Annual Golf Tournament 2023</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="https://apjii.or.id/assets/images/favicon.png" />

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

    <style>
        html,
        body {
            font-family: "Montserrat", sans-serif;
        }

        body {
            background-image: url("https://bnetfit.id/apjii/background.png");
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
</head>

<body class="d-flex flex-column min-vh-100 dark" data-bs-theme="light">
    <div class="parallax"></div>
    <div class="container my-5">
        <div class="d-flex justify-content-center flex-column align-items-center">
            <img src="https://bnetfit.id/apjii/APJII Golf 6 - black.png" alt="Logo Logo APJII GOLF" class="img-fluid"
                style="max-width: 350px;" />
            <h1 class="fw-bold my-5 text-center" style="color: #000">
                APJII 6ᵗʰ Annual Golf Tournament 2023
            </h1>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body" id="sponsor"></div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <footer class="d-flex justify-content-center border-top my-4 flex-wrap pt-3">
            <div class="col-8 d-flex align-items-center">
                <a href="/" class="mb-md-0 text-muted text-decoration-none lh-1 mb-3 me-2">
                    <img src="https://bnetfit.id/apjii/logo-apjii white simple.png" style="width: 80px" />
                </a>
                <span class="mb-md-0 mb-3 text-white">
                    © Copyright 2023. Asosiasi Penyelenggara Jasa Internet Indonesia.
                </span>
            </div>

            <ul class="nav col-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3">
                    <a href="https://www.facebook.com/profile.php?id=100078846007523" target="_blank"
                        class="text-white">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a href="https://www.instagram.com/apjii/" target="_blank" class="text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a href="https://www.youtube.com/channel/UC-PJ7U_CUfA0dzwMXvFm6ag" target="_blank"
                        class="text-white">
                        <i class="fab fa-youtube"></i>
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


    <script>
        let host = "https://bnetfit.id";
        // let host = "https://bnetfit_lara.test";

        $(document).ready(() => {
            $('#sponsor').html(`<img src="https://bnetfit.id/apjii/SPONSOR-CLOSING.png" class="img-fluid" />`);

            $(window).on('orientationchange resize', function() {
                $('#sponsor').html(``);
                if ($('body').width() >= 768) {
                    $('#sponsor').html(
                        `<img src="https://bnetfit.id/apjii/SPONSOR-CLOSING.png" class="img-fluid" />`);
                } else {
                    $('#sponsor').html(
                        `<img src="https://bnetfit.id/apjii/SPONSOR-CLOSING.png" class="img-fluid" />`);
                }
            });
        });
    </script>
</body>

</html>
