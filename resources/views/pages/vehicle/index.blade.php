@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card bg-white">
                <div class="card-body">
                    <a href="{{ route('vehicles.create') }}" 
                        class="btn btn-primary mb-3"
                    >+ Buat Data Kendaraan Baru</a>
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
                                    <th>Perusahaan Penyewa</th>
                                    <th>Tanggal Service</th>
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
                url: '{{ route('vehicles.index') }}',
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'categories.name', name: 'categories.name'},
                {data: 'fuel', name: 'fuel'},
                {data: 'rental_company', name: 'rental_company', defaultContent: "-"},
                {data: 'service_date', name: 'service_date'},
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