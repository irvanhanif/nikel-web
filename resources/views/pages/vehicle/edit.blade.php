@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-white">
                <div class="card-body">
                    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                        <div class="mb-3">
                            <label for="vehicleName" class="form-label">Nama Kendaraan</label>
                            <input
                                type="text"
                                name="name"
                                id="vehicleName"
                                class="form-control"
                                placeholder="Nama Kendaraan"
                                value="{{ $vehicle->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="categoriesId" class="form-label">Label Kategori</label>
                            <select name="category" id="categoriesId" class="form-control">
                                <option value="" disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $vehicle->categories->id ? 'selected' : '' }}
                                    >{{ $category->name }}</option>
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
                                value="{{ $vehicle->fuel }}">
                        </div>
                        <div class="mb-3">
                            <label for="rental_company" class="form-label">Perusahaan Penyewa Kendaraan</label>
                            <input
                                type="text"
                                name="rental_company"
                                id="rental_company"
                                class="form-control"
                                placeholder="Nama Perusahaan Penyewa"
                                value="{{ $vehicle->rental_company }}">
                        </div>
                        <div class="mb-3">
                            <label for="service_date" class="form-label">Tanggal Service</label>
                            <input
                                type="date"
                                name="service_date"
                                id="service_date"
                                class="form-control"
                                value="{{ $vehicle->service_date }}">
                        </div>
                        <div class="mt-3" style="text-align: right" >
                            <button type="submit"class="btn btn-success px-4">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection