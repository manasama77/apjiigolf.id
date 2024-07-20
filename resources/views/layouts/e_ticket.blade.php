<meta name="viewport" content="width=device-width, initial-scale=1">
{{-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet"> --}}

<style>
    * {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
    }

    @page {
        margin: 0px;
    }

    html {
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
    }

    body {
        margin: 0px;
        padding: 0px;
        background: url('{{ public_path('apjii-golf-7/e-ticket.jpg') }}') center no-repeat;
        background-size: cover;
    }

    .container {
        width: 100%;
        display: flex;
        position: relative;
        justify-content: center;
        text-align: center;
    }

    .nama_peserta_wrapper {
        position: absolute;
        top: 40%;
        left: 0;
        width: 100%;
        height: 50px;
        margin: 0;
        padding: 0;
    }

    .nama_peserta {
        position: absolute;
        top: 80px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 40px;
        color: #000;
        font-weight: 700;
        z-index: 1;
        margin: 0;
        padding: 0;
        width: 100%;
        inline-size: 300px;
        overflow-wrap: break-word;
        line-height: 8px;
        text-align: center;
    }

    .barcode-bg {
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translate(-50%, 0%);
        background-color: white;
        width: 40%;
        height: 22%;
        border: 1px solid rgb(0, 0, 0);
        border-radius: 5%;
        padding: 4px;
    }

    .barcode {
        position: absolute;
        text-align: center;
        top: 5%;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1;
        color: #000;
        margin: 0;
    }

    .text_barcode {
        font-family: 'Poppins', sans-serif;
        position: absolute;
        text-align: left;
        bottom: 1;
        left: 50%;
        transform: translateX(-50%);
        font-size: 38px;
        z-index: 1;
        color: #000;
        font-weight: 700;
        letter-spacing: 5px;
        margin: 0;
    }

    .text_registration_number {
        font-family: 'Poppins', sans-serif;
        position: absolute;
        text-align: center;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        font-size: 30px;
        z-index: 1;
        color: #000;
        font-weight: 700;
        letter-spacing: 0px;
        margin: 0;
        width: 100%;
    }

    .background {
        width: 100%;
        height: 100%;
    }

    .img-wrapper {
        position: absolute;
        top: 30px;
        left: 50%;
        width: 100vw;
        transform: translateX(-50%);
    }

    .img-wrapper .img-logo-jlm {
        width: 150px;
    }

    .img-wrapper .img-logo {
        width: 300px;
        margin-top: 0px;
    }
</style>

<body style="position: relative;">
    <div class="container">

        <div class="info-wrapper">
            <div class="nama_peserta_wrapper">
                <p class="nama_peserta">Hi, {{ strtoupper($full_name) }}</p>
            </div>
        </div>


        <div class="barcode-bg">
            {{-- <p class="text_registration_number">Registration Number</p> --}}
            <p class="text_barcode">
                {{ $barcode }}
            </p>
            <p class="barcode">
                {!! $bar !!}
            </p>
        </div>

        {{-- <img src="{{ public_path('poundfit/etiket_bg_vertical.webp') }}" class="background" /> --}}
    </div>
</body>

</html>
