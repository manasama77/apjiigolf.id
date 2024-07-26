<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>APJII Golf Tournament 7 - 2024</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="https://apjii.or.id/assets/images/favicon.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <style>
        html,
        body {
            font-family: "Montserrat", sans-serif;
        }

        body {
            background-image: url("{{ asset('golf-background.jpg') }}");
            background-size: cover;
            background-attachment: scroll;
            background-position: top center;
            background-repeat: repeat-y;
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="table-responsive d-flex my-5">
            <table class="table-bordered table bg-white">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ORDER ID</th>
                        <th>INVOICE NUMBER</th>
                        <th>FULL NAME</th>
                        <th>GENDER</th>
                        <th>EMAIL</th>
                        <th>WHATSAPP</th>
                        <th>COMPANY</th>
                        <th>POSITION</th>
                        <th>INSTUTUTION</th>
                        <th>INSTUTUTION ETC</th>
                        <th>SHIRT SIZE</th>
                        <th>TICKET TYPE</th>
                        <th>PROMO CODE</th>
                        <th>TICKET PRICE</th>
                        <th>PAYMENT STATUS</th>
                        <th>BARCODE</th>
                        <th>PAYMENT EXPIRED</th>
                        <th>IS CHECKIN</th>
                        <th>REGISTER AT</th>
                    </tr>
                </thead>
                <tbody id="v_data">
                    @foreach ($datas as $data)
                        <tr>
                            <th>{{ $data->order_id }}</th>
                            <th>{{ $data->invoice_number }}</th>
                            <th>{{ $data->full_name }}</th>
                            <th>{{ $data->gender }}</th>
                            <th>{{ $data->email }}</th>
                            <th>{{ $data->whatsapp }}</th>
                            <th>{{ $data->company }}</th>
                            <th>{{ $data->position }}</th>
                            <th>{{ $data->institution }}</th>
                            <th>{{ $data->institution_etc }}</th>
                            <th>{{ $data->shirt_size }}</th>
                            <th>{{ $data->ticket_type }}</th>
                            <th>{{ $data->promo_code }}</th>
                            <th>{{ $data->ticket_price }}</th>
                            <th>{{ $data->payment_status }}</th>
                            <th>{{ $data->barcode }}</th>
                            <th>{{ $data->payment_expired }}</th>
                            <th>{{ $data->is_checkin }}</th>
                            <th>{{ $data->created }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
