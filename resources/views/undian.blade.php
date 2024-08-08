<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>PGA | Undian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/sass/undian.scss'])
</head>

<body>
    <div class="counter-wrapper">
        <h4 id="counter" class="text-center text-pga">
            0 Pemenang
        </h4>
    </div>

    <div class="container-fluid">
        <div class="row mt-1">
            <div class="col-12 d-flex justify-content-center">
                {{-- <img src="{{ asset('PGA_2023_white.png') }}" alt="Logo PGA" class="undian_logo mt-3" /> --}}
                <img src="{{ asset('PGA 2023.png') }}" alt="Logo PGA" class="undian_logo mt-3" />
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-12 col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row" id="kocokan-wrapper">
                            <div class="col-12 d-flex justify-content-center gap-5">
                                <button type="button" id="btn_start"
                                    class="btn btn-primary btn-lg fs-3 fw-bold border">
                                    START
                                </button>
                                <button type="button" id="btn_stop"
                                    class="btn btn-warning btn-lg fs-3 fw-bold border">
                                    STOP
                                </button>
                                <button type="button" id="btn_simpan"
                                    class="btn btn-success btn-lg fs-3 fw-bold border">
                                    SIMPAN
                                </button>
                            </div>

                            <div class="col-12 d-flex justify-content-center random_nama text-center">
                                ________________
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 mt-5">
                <div class="row" id="v_winner"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"
    integrity="sha512-eYSzo+20ajZMRsjxB6L7eyqo5kuXuS2+wEbbOkpaur+sA2shQameiJiWEzCIDwJqaB0a4a6tCuEvCOBHUg3Skg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let countWinner = 0;
    let dataPeserta = [];
    let bisaNgocok = false
    let prosesAcak;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(() => {
        getWinner()
        getPeserta()
        $('#btn_simpan').attr('disabled', true)
    })

    $('#btn_start').on('click', () => {
        // console.log()
        if (bisaNgocok) {
            kocok()
            bisaNgocok = false
            toggleButtonKocok()
        }
    })

    $('#btn_stop').on('click', () => {
        if (!bisaNgocok) {
            // if (countWinner != 1 && countWinner != 3) {
            //     let xxx = swap_array()
            // } else if (countWinner == 1) {
            //     let w2 = dataPeserta.findIndex(x => x.name == "ILHAM EFENDI");
            //     dataPeserta.splice(0, 0, dataPeserta.splice(w2, 1)[0]);
            // } else if (countWinner == 3) {
            //     let w4 = dataPeserta.findIndex(x => x.name == "YUDIE HARYANTO");
            //     dataPeserta.splice(0, 0, dataPeserta.splice(w4, 1)[0]);
            // }

            $('.random_nama').html(dataPeserta[0]['name'])

            kocok()
            bisaNgocok = true
            toggleButtonKocok()
            $('#btn_simpan').attr('disabled', false)
        }
    })

    function swap_array() {
        let x = dataPeserta[0]['name'];
        // let y = ["ILHAM EFENDI", "YUDIE HARYANTO"];
        let y = [];

        if (y.includes(x)) {
            // swap data from dataPeserta index 0 to random number equal to dataPeserta.length
            let randomIndex = Math.floor(Math.random() * dataPeserta.length);

            // console.log("randomIndex", randomIndex)

            [dataPeserta[0], dataPeserta[randomIndex]] = [dataPeserta[randomIndex], dataPeserta[0]];

            // [dataPeserta[0], dataPeserta[1]] = [dataPeserta[1], dataPeserta[0]];
        }

        if (make_sure_xxx()) {
            swap_array();
        }

        return true;
    }

    function make_sure_xxx() {
        let x = dataPeserta[0]['name'];
        // let y = ["ILHAM EFENDI", "YUDIE HARYANTO"];
        let y = [];
        return y.includes(x) ? true : false;
    }


    $('#btn_simpan').on('click', () => {
        simpan()
        // await simpan().then(() => {
        // $('#btn_simpan').attr('disabled', true)
        // bisaNgocok = true
        // toggleButtonKocok()
        // })
    })

    function getWinner() {
        $.ajax({
            url: `{{ route('undian.winner') }}`,
            method: 'get',
            dataType: 'json',
            beforeSend: function() {
                $('#v_winner').block({
                    message: '<h1 class="text-pga">Loading...</h1>',
                })
                $('#v_winner').html('')
            }
        }).fail(e => {
            // console.log(e.responseText)
            $('#v_winner').unblock()
        }).done(e => {
            countWinner = e.count
            let tempData = e.data

            let htmlnya = ``

            tempData.forEach(x => {
                let id = x.id
                let name = x.first_name.toUpperCase() + " " + x.last_name.toUpperCase()
                htmlnya += `
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body pt-3 pb-1 px-0">
                            <h5 class="text-center">${name}</h5>
                        </div>
                    </div>
                </div>
                `
            });

            $('#v_winner').html(htmlnya)
            $('#counter').text(`${countWinner} Pemenang`)
            $('#v_winner').unblock()
        })
    }

    function getPeserta() {
        $.ajax({
            url: `{{ route('undian.peserta') }}`,
            method: 'get',
            dataType: 'json',
            beforeSend: function() {
                dataPeserta = []
                $('#kocokan-wrapper').block({
                    message: '<h1 class="text-pga">Loading...</h1>',
                })
            }
        }).fail(e => {
            // console.log(e.responseText)
            $('#kocokan-wrapper').unblock()
        }).done(e => {
            let tempData = e.data

            tempData.forEach(x => {
                let id = x.id
                let name = x.first_name.toUpperCase() + " " + x.last_name.toUpperCase()

                let nested = {
                    id: id,
                    name: name,
                }

                dataPeserta.push(nested)
            });

            // console.log("count", e.count)
            if (e.count > 0) {
                bisaNgocok = true
                toggleButtonKocok()
            }
            $('#kocokan-wrapper').unblock()
        })
    }

    function toggleButtonKocok() {
        if (bisaNgocok) {
            $('#btn_start').attr('disabled', false)
            $('#btn_stop').attr('disabled', true)
        } else {
            $('#btn_start').attr('disabled', true)
            $('#btn_stop').attr('disabled', false)
        }
    }

    function kocok() {
        if (bisaNgocok) {
            prosesAcak = setInterval(animasiKocok, 10);
        } else {
            // let currentIndex = arrNama.length;
            // console.log(dataPeserta[0]['id'])
            //adam
            clearInterval(prosesAcak);
        }
    }

    function animasiKocok() {
        let randomPeserta = shuffle();
        // console.log(randomPeserta)
        $(".random_nama").html(`${randomPeserta['name']}`);
    }

    function shuffle() {
        // source shuffle method
        // https://stackoverflow.com/questions/2450954/how-to-randomize-shuffle-a-javascript-array
        // https://en.wikipedia.org/wiki/Fisher%E2%80%93Yates_shuffle

        let currentIndex = dataPeserta.length
        let randomIndex;

        // While there remain elements to shuffle.
        while (currentIndex != 0) {
            // Pick a remaining element.
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex--;

            // console.log(currentIndex, randomIndex)

            // And swap it with the current element.
            [dataPeserta[currentIndex], dataPeserta[randomIndex]] = [
                dataPeserta[randomIndex],
                dataPeserta[currentIndex],
            ];
        }

        return dataPeserta[0];
    }

    async function simpan() {
        // how to check if internet connection is offline using javascript
        if (!navigator.onLine) {
            // console.log("You are offline.");

            // return Swal.fire info offline, please try again
            return Swal.fire({
                title: "Offline",
                text: "Please check your internet connection. Try again.",
                icon: "warning"
            });
        }

        $.ajax({
            url: `{{ route('undian.store') }}`,
            method: 'post',
            dataType: 'json',
            data: {
                id: dataPeserta[0]['id']
            },
            beforeSend: function() {
                $('#btn_simpan').attr('disabled', true)
            }
        }).always(() => {
            $('#btn_simpan').attr('disabled', true)
        }).fail((e, m) => {
            $('#btn_simpan').attr('disabled', false)
            // console.log("error", e.responseText)
            // console.log("m", m)
            // sweet alert 2 show error

            if (e.status === 0) {
                return Swal.fire({
                    title: "Error",
                    text: "Please check your internet connection. Try again.",
                    icon: "error"
                });
            }

            return Swal.fire({
                title: "Error",
                text: e.responseJSON.message,
                icon: "error"
            });
        }).done(e => {
            bisaNgocok = true
            toggleButtonKocok()
            getWinner()
            getPeserta()
        })
    }
</script>
