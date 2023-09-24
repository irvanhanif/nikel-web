@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card bg-white">
                <div class="card-body">
                    <a href="{{ route('vehicleUse.create') }}" 
                        class="btn btn-primary mb-3"
                    >+ Pinjam Kendaraan Kantor</a>
                    <div class="table-responsive">
                        <table 
                            class="table table-hover scroll-horizontal-vertical w-100" 
                            id="crudTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kendaraan</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Bahan Bakar</th>
                                    <th>Driver</th>
                                    <th>Status Peminjaman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{{ route('vehicleUse.index') }}'
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'vehicle.name', name: 'vehicle.name'},
                {data: 'vehicle.categories.name', name: 'vehicle.categories.name'},
                {data: 'vehicle.fuel', name: 'vehicle.fuel'},
                {data: 'driver', name: 'driver'},
                {data: 'status', name: 'status'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        })
    </script>
@endpush