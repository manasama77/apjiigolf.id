<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
    @font-face {
        font-family: 'Poppins';
        src: url({{ storage_path('fonts/Poppins-Thin.ttf') }}) format("truetype");
        font-weight: 100;
        font-style: normal; // use the matching font-style here
    }

    @font-face {
        font-family: 'Poppins';
        src: url({{ storage_path('fonts/Poppins-ExtraLight.ttf') }}) format("truetype");
        font-weight: 200;
        font-style: normal; // use the matching font-style here
    }

    @font-face {
        font-family: 'Poppins';
        src: url({{ storage_path('fonts/Poppins-Light.ttf') }}) format("truetype");
        font-weight: 300;
        font-style: normal; // use the matching font-style here
    }

    @font-face {
        font-family: 'Poppins';
        src: url({{ storage_path('fonts/Poppins-Regular.ttf') }}) format("truetype");
        font-weight: 400;
        font-style: normal; // use the matching font-style here
    }

    @font-face {
        font-family: 'Poppins';
        src: url({{ storage_path('fonts/Poppins-Medium.ttf') }}) format("truetype");
        font-weight: 400;
        font-style: normal; // use the matching font-style here
    }

    @font-face {
        font-family: 'Poppins';
        src: url({{ storage_path('fonts/Poppins-Medium.ttf') }}) format("truetype");
        font-weight: 500;
        font-style: normal; // use the matching font-style here
    }

    @font-face {
        font-family: 'Poppins';
        src: url({{ storage_path('fonts/Poppins-SemiBold.ttf') }}) format("truetype");
        font-weight: 600;
        font-style: normal; // use the matching font-style here
    }

    @font-face {
        font-family: 'Poppins';
        src: url({{ storage_path('fonts/Poppins-Bold.ttf') }}) format("truetype");
        font-weight: 700;
        font-style: normal; // use the matching font-style here
    }

    @font-face {
        font-family: 'Poppins';
        src: url({{ storage_path('fonts/Poppins-BoldItalic.ttf') }}) format("truetype");
        font-weight: 800;
        font-style: normal; // use the matching font-style here
    }

    @font-face {
        font-family: 'Poppins';
        src: url({{ storage_path('fonts/Poppins-Black.ttf') }}) format("truetype");
        font-weight: 900;
        font-style: normal; // use the matching font-style here
    }


    * {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
    }

    @page {
        margin: 0px;
    }

    html {
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 1cm 2cm;
    }

    body {
        margin: 0px;
        padding: 0px;
    }

    h1 {
        margin: 0px !important;
        padding: 0px !important;
        font-size: 2rem;
        line-height: 20px;
    }

    p {
        margin: 0px;
        padding: 0px;
        line-height: 11px;
    }

    .container {
        width: 100%;
        display: flex;
        position: relative;
        justify-content: center;
        text-align: center;
    }

    .table {
        width: 100%;
        padding: 0px;
        margin: 0px;
        border-spacing: 0px;
        border-collapse: collapse;
        border-width: 0px;
        border-color: black;
        border-style: solid;
        color: black;
    }

    .table th,
    .table td {
        border-width: 0px;
        border-color: #000000;
        border-style: solid;
        padding: 5px;
    }

    .table .table-borderless {
        border: none;
    }

    .table .table-bordered th,
    .table .table-bordered td {
        border-width: 0px;
        border-color: #000000;
        border-style: solid;
        padding: 5px;
    }

    .table.table-borderless td {
        padding: 0px;
        margin: 0px;
        vertical-align: top;
    }

    .table.table-bordered th {
        padding: 0px 5px 0px 5px !important;
        margin: 0px;
        vertical-align: top;
        line-height: 12px;

        border: 1px solid black;
    }

    .table.table-bordered td {
        padding: 0px 5px 0px 5px !important;
        margin: 0px;
        vertical-align: top;
        line-height: 12px;

        border: 1px solid black;
    }

    .logo {
        margin-left: 10px;
        width: 150px;
    }
</style>

<body style="position: relative;">
    <div class="container">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td style="width: 40%;">
                        <img src="{{ public_path('logo_pga_invoice.png') }}" alt="logo" class="logo" />
                    </td>
                    <td style="width: 60%; text-align: right;">
                        <p>
                            <strong>Persatuan Golf APJII (PGA)</strong>
                        </p>
                        <p>Ruko Imperium Park Block C1</p>
                        <p>Jalan Raya Mayor Oking</p>
                        <p>Jaya Atmaja No.63</p>
                        <p>Cibinong, Bogor 16918 Indonesia</p>
                        <p>Phone: +62 856-9016-901</p>
                        <p>Email: marketing@apjiigolf.id</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p>&nbsp;</p>

        <table class="table table-bordered" style="width: 60%;">
            <tbody>
                <tr>
                    <td>Bill to: {{ $player_name }}</td>
                </tr>
            </tbody>
        </table>

        <h1 style="text-align: right;">INVOICE</h1>

        <table border="1" class="table table-bordered" style="margin-top: 15px;">
            <thead>
                <tr>
                    <th>Invoice No</th>
                    <th>Invoice Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">{{ $invoice_number }}</td>
                    <td style="text-align: center;">{{ $invoice_date }}</td>
                </tr>
            </tbody>
        </table>

        <table border="1" class="table table-bordered" style="margin-top: 15px;">
            <thead>
                <tr>
                    <th style="width: 25%; text-align: left;">Event Name</th>
                    <th style="text-align: left;">Event Location</th>
                    <th style="width: 18%; text-align: left;">Event Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: left;">{{ $event_name }}</td>
                    <td style="text-align: left;">{{ $location_name }}<br /><small
                            style="font-size: 12px;">{{ $location_address }}</small>
                    </td>
                    <td style="text-align: center;">{{ $event_date }}</td>
                </tr>
            </tbody>
        </table>

        <table border="1" class="table table-bordered" style="margin-top: 15px;">
            <thead>
                <tr>
                    <th style="width: 80%">Description</th>
                    <th style="width: 20%">IDR</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: left; height: 100px;">
                        Registration Fee {{ $event_name }}<br />
                        {{ $player_name }}
                    </td>
                    <td style="text-align: right;">
                        {{ number_format($ticket_price, 0) }}
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td style="text-align: right; font-weight: 700;">Total Amount</td>
                    <td style="text-align: right; font-weight: 700;">{{ number_format($ticket_price, 0) }}</td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: 700;">Admin Fee</td>
                    <td style="text-align: right; font-weight: 700;">{{ number_format($admin_fee, 0) }}</td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: 700;">Grand Total</td>
                    <td style="text-align: right; font-weight: 700;">{{ number_format($grand_total, 0) }}</td>
                </tr>
            </tfoot>
        </table>

        <table class="table table-borderless" style="margin-top: 15px;">
            <thead>
                <tr>
                    <th style="width: 70%;">&nbsp;</th>
                    <th style="width: 30%; text-align: center">{{ $invoice_date }}</th>
                </tr>
                <tr>
                    <th style="width: 30%; height: 150px;">&nbsp;</th>
                    <th style="width: 30%; text-align: center">PGA</th>
                </tr>
            </thead>
        </table>
    </div>
</body>

</html>
