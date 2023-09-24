@extends('layouts.app')

@section('structure')
    <div class="w-100">
        @include('includes.navbar')
        <div class="top">
            <img src="https://www.patrarijaya.co.id/wp-content/uploads/2018/12/truck-patra.jpg" alt="bg-top">
        </div>
        <div class="sectionPage">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card col-lg-8 col-md-10 col-sm-12">
                        <div class="card-body">
                            <form method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <select name="categories_id" class="form-control" id="categories_id">
                                            <option value="0" selected>Pilih Jenis Kendaraan</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama Kendaraan">
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-primary">Cari Kendaraan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card col-lg-8 col-md-10 col-sm-12 mt-3 mb-5">
                        <div class="card-body">
                            <div class="row">
                                @forelse ($vehicles as $vehicle)
                                    <a href="{{ route('create-vehicle-use', $vehicle->id) }}" class="text-decoration-none col-sm-12 col-md-6 col-lg-4">
                                        <div
                                            class="card mb-3"
                                            id="cardVehicle"
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
                                    </a>
                                @empty
                                    <p class="card-text text-center text-secondary">belum terdapat data kendaraan</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}