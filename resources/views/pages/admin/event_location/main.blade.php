@extends('layouts.dashboard')

@section('aku_isi_mas')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Event Location</h1>
                </div><!-- /.col -->
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.event_location.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-fw fa-plus"></i> Create
                    </a>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="v_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Start Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">
                                        <i class="fas fa-cogs"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lists as $l)
                                    <tr>
                                        <td>{{ $l->location->name }}</td>
                                        <td>{{ $l->start_date->format('d F Y') }}</td>
                                        <td class="text-center">{!! $l->is_active_badge !!}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.event_location.edit', $l->id) }}" class="btn btn-info">
                                                <i class="fas fa-fw fa-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger"
                                                onclick="askDelete({{ $l->id }}, '{{ $l->name }}')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <form id="form_delete_{{ $l->id }}"
                                                action="{{ route('admin.event_location.destroy', $l->id) }}" method="post"
                                                style="display: none">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"></button>
                                            </form>
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
@endsection

@section('skrip_jawa')
    <script>
        $(document).ready(() => {
            new DataTable('#v_table', {
                "ordering": false
            });
        })

        function askDelete(id, nama) {
            Swal.fire({
                icon: 'question',
                title: `Delete Data ${nama}`,
                text: `You won't be able to revert this!`,
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#ccc',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    prosesDelete(id)
                }
            })
        }

        function prosesDelete(id) {
            document.getElementById(`form_delete_${id}`).submit()
        }
    </script>
@endsection
