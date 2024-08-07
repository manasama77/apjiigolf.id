@extends('layouts.dashboard')

@section('aku_isi_mas')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $page_title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tables" class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <i class="fas fa-cogs"></i>
                                            </th>
                                            <th>Invoice Number</th>
                                            <th>Payment Status</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>WhatsApp</th>
                                            <th>Company</th>
                                            <th>Position</th>
                                            <th>Institution</th>
                                            <th>Shirt Size</th>
                                            <th>Ticket Type</th>
                                            <th>Barcode</th>
                                            <th>Handicap</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($registrations as $r)
                                            <tr>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            Download
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ route('register_download_eticket', $r->invoice_number) }}"
                                                                class="dropdown-item">
                                                                <i class="fas fa-file-pdf"></i> Invoice
                                                            </a>
                                                            <a href="{{ route('register_download_eticket', $r->invoice_number) }}"
                                                                class="dropdown-item">

                                                                <i class="fas fa-file-pdf"></i> Eticket
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $r->invoice_number }}
                                                </td>
                                                <td>
                                                    {{ strtoupper($r->payment_status) }}
                                                </td>
                                                <td>
                                                    {{ strtoupper($r->first_name) }} {{ strtoupper($r->last_name) }}
                                                </td>
                                                <td>
                                                    {{ strtoupper($r->gender) }}

                                                </td>
                                                <td>
                                                    {{ $r->email }}
                                                </td>
                                                <td>
                                                    {{ $r->whatsapp_number }}
                                                </td>
                                                <td>
                                                    {{ $r->company_name }}
                                                </td>
                                                <td>
                                                    {{ $r->position }}
                                                </td>
                                                <td>
                                                    {{ $r->institution }} {{ $r->institution_etc }}
                                                </td>
                                                <td>
                                                    {{ strtoupper($r->shirt_size) }}

                                                </td>
                                                <td>{{ strtoupper($r->ticket_type) }}</td>
                                                <td>{{ $r->barcode }}</td>
                                                <td>{{ $r->handicap }}</td>
                                                <td>{{ $r->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('skrip_jawa')
    <script>
        $(document).ready(() => {
            new DataTable('#tables', {
                scrollX: true,
                order: [
                    [1, 'desc']
                ],
                columnDefs: [{
                    targets: [0],
                    orderable: false
                }],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],

                pageLength: 10,

                layout: {
                    topStart: ['buttons', 'pageLength']

                        ,
                    topEnd: 'search',
                    bottomStart: 'info',
                    bottomEnd: 'paging'

                },
                buttons: [
                    'copy', 'csv', {
                        extend: 'excel',
                        className: 'btn-success',
                        title: 'Registrations APJII Golf Tournament 7 - ' + new Date().getFullYear() +
                            new Date().getMonth() + new Date().getDate(),
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                                page: 'all',
                                selected: null,
                            }
                        },
                    }
                ]
            });

        })
    </script>
@endsection
