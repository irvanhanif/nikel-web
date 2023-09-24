@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-white mb-5">
                <div class="card-body">
                    <form action="{{ route('vehicleUse.update', $vehicleUse->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                        <div class="mb-3">
                            <div class="card bg-white" id="dataKendaraan">
                                <div class="card-body">
                                    <h5 class="card-title">Data Kendaraan</h5>
                                    <div class="mb-3">
                                        <label for="vehicleName" class="form-label">Nama Kendaraan</label>
                                        <input
                                            type="text"
                                            name="name"
                                            id="vehicleName"
                                            class="form-control"
                                            value="{{ $vehicleUse->vehicle->name }}"
                                            disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoriesName" class="form-label">Jenis Kendaraan</label>
                                        <input
                                            type="text"
                                            name="categoriesName"
                                            id="categoriesName"
                                            class="form-control"
                                            value="{{ $vehicleUse->vehicle->categories->name }}"
                                            disabled>
                                    </div>
                                    <div class="">
                                        <label for="fuel" class="form-label">Bahan Bakar</label>
                                        <input
                                            type="text"
                                            name="fuel"
                                            id="fuel"
                                            class="form-control"
                                            value="{{ $vehicleUse->vehicle->fuel }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>

                            <a
                                class="btn mt-3 btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                            >
                                Ganti Kendaraan
                            </a>
                            <div
                                class="modal fade"
                                id="exampleModal"
                                tabindex="-1"
                                aria-labelledby="exampleModalLabel"
                                aria-hidden="true"
                            >
                                <div class="modal-dialog  modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                Pilih Kendaraan yang ingin dipinjam
                                            </h1>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                id="close-btn-modal"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            ></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                @forelse ($vehicles as $vehicle)
                                                    <div
                                                        class="col-sm-12 col-md-6 col-lg-4"
                                                        onclick="pilihKendaraan({{ $vehicle->id }})"
                                                    >
                                                        <div
                                                            class="card mb-3"
                                                            id="cardVehicle"
                                                            style="cursor: pointer"
                                                        >
                                                            <div class="card-body">
                                                                <div class="mb-2">
                                                                    <h5 class="card-title mb-0">Nama Kendaraan</h5>
                                                                    <p class="card-text">{{ $vehicle->name }}</p>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <h5 class="card-title mb-0">Jenis Kendaraan</h5>
                                                                    <p class="card-text">{{ $vehicle->categories->name }}</p>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <h5 class="card-title mb-0">Bahan Bakar</h5>
                                                                    <p class="card-text">{{ $vehicle->fuel }}</p>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <h5 class="card-title mb-0">Perusahaan Penyewa</h5>
                                                                    <p class="card-text">{{ $vehicle->rental_company ?? '-' }}</p>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <h5 class="card-title mb-0">Tanggal Servis Kendaraan</h5>
                                                                    <p class="card-text">{{ $vehicle->service_date }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button
                                                type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal"
                                            >Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="vehicles_id" id="vehicles_id" value="{{ $vehicleUse->vehicle->id }}" required>
                        </div>
                        @if (Auth::user()->roles == "ADMIN")
                            <div class="mb-3">
                                <label for="users_id" class="form-label">Nama Peminjam</label>

                                <select name="users_id" id="users_id" class="form-control" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $vehicleUse->user->id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <input type="hidden" name="users_id" id="users_id" value="{{ $vehicleUse->user->id }}">
                            <label for="userName" class="form-label">Peminjam Kendaraan</label>
                            <input type="text" id="userName" class="mb-3 form-control" value="{{ $vehicleUse->user->name }}" disabled>
                        @endif
                        <div class="mb-3">
                            <label for="driver" class="form-label">Pengemudi</label>
                            <input
                                type="text"
                                name="driver"
                                id="driver"
                                class="form-control"
                                placeholder="Nama Pengemudi"
                                value="{{ $vehicleUse->driver }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status Peminjaman</label>
                            <select name="status" class="form-control" id="status">
                                @php
                                    $opsiStatus = ['PENDING', 'APPROVED', 'REJECT', 'IN USE', 'DONE']
                                @endphp
                                @foreach ($opsiStatus as $status)
                                    <option value="{{ $status }}" {{ $status == $vehicleUse->status ? 'selected' : ''}}>{{ $status }}</option>
                                @endforeach
                            </select>
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

@push('addon-script')
    <script>
        function pilihKendaraan ($id) {
            document.getElementById('vehicles_id').value = $id;
            document.getElementById('close-btn-modal').click();
            fetch('{{ url('api/vehicle') }}/' + $id)
            .then(res => res.json())
            .then(data => {
                const vehicle = document.getElementById('dataKendaraan');
                vehicle.classList.remove('d-none');

                const inputForm = vehicle.getElementsByTagName('input');
                for (let i = 0; i < inputForm.length; i++) {
                    if(inputForm[i].name == "categoriesName") {
                        inputForm[i].value = data.categories.name;
                    } else
                        inputForm[i].value = data[inputForm[i].name];
                }
            })
        }
    </script>
@endpush