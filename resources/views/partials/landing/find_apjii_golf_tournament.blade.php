<section class="page-section bg-secondary" id="upcoming_event" style="min-height: 96vh;">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="row my-3">

                    <div class="col-sm-12 col-md-8 mx-auto mb-5">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">List Transaction</h5>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Transaction Date Time</th>
                                                <th>Invoice</th>
                                                <th>Status</th>
                                                <th>
                                                    <i class="fas fa-cog"></i>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($regs as $reg)
                                                <tr>
                                                    <td>{{ $reg->created_at->diffForHumans() }}</td>
                                                    <td>{{ $reg->invoice_number }}</td>
                                                    <td>{{ strtoupper($reg->payment_status) }}</td>
                                                    <td>
                                                        <a href="{{ route('register_status', $reg->id) }}"
                                                            class="btn btn-info">
                                                            <i class="fas fa-eye"></i> Show
                                                        </a>
                                                    </td>
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
    </div>
</section>
