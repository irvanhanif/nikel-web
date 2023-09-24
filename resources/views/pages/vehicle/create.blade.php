@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-white">
                <div class="card-body">
                    <form action="{{ route('vehicles.store') }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="vehicleName" class="form-label">Nama Kendaraan</label>
                            <input
                                type="text"
                                name="name"
                                id="vehicleName"
                                class="form-control"
                                placeholder="Nama Kendaraan"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="categoriesId" class="form-label">Jenis Kendaraan</label>
                            <select name="category" id="categoriesId" class="form-control" required>
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fuel" class="form-label">Bahan Bakar</label>
                            <input
                                type="text"
                                name="fuel"
                                id="fuel"
                                class="form-control"
                                placeholder="Jenis Bahan Bakar"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="rental_company" class="form-label">Perusahaan Penyewa Kendaraan</label>
                            <input
                                type="text"
                                name="rental_company"
                                id="rental_company"
                                class="form-control"
                                placeholder="Nama Perusahaan Penyewa">
                        </div>
                        <div class="mb-3">
                            <label for="service_date" class="form-label">Tanggal Service</label>
                            <input
                                type="date"
                                name="service_date"
                                id="service_date"
                                class="form-control"
                                required>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success">kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection