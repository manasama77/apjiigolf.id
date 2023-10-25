@extends('layouts.dashboard')

@section('aku_isi_mas')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Location</h1>
                </div><!-- /.col -->
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.master_location.create') }}" class="btn btn-primary mb-3">
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
                                    <th>Banner</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>
                                        OUT<br />
                                        <small>Par 1 ~ 9</small>
                                    </th>
                                    <th>
                                        IN<br />
                                        <small>Par 10 ~ 18</small>
                                    </th>
                                    <th class="text-center">
                                        <i class="fas fa-cogs"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lists as $l)
                                    <tr>
                                        <td class="text-center">{!! $l->banner_path !!}</td>
                                        <td>{{ $l->name }}</td>
                                        <td>{{ $l->address }}</td>
                                        <td>{{ $l->contact }}</td>
                                        <td class="text-center">{{ $l->out }}</td>
                                        <td class="text-center">{{ $l->in }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.master_location.edit', $l->id) }}"
                                                class="btn btn-info">
                                                <i class="fas fa-fw fa-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger"
                                                onclick="askDelete({{ $l->id }}, '{{ $l->name }}')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <form id="form_delete_{{ $l->id }}"
                                                action="{{ route('admin.master_location.destroy', $l->id) }}"
                                                method="post" style="display: none">
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
            new DataTable('#v_table');
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
