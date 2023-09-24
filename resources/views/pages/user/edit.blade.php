@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-white">
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama User</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                placeholder="Nama"
                                value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Pengguna</label>
                            <input
                                type="text"
                                name="email"
                                id="email"
                                class="form-control"
                                placeholder="Email Pengguna"
                                value="{{ $user->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="roles" class="form-label">Tanggal Service</label>
                            <select name="roles" id="roles" class="form-control">
                                <option value="USER" {{ $user->roles == 'USER' ? 'selected' : '' }}>USER</option>
                                <option value="ADMIN" {{ $user->roles == 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan di Perusahaan</label>
                            <input
                                type="text"
                                name="jabatan"
                                id="jabatan"
                                class="form-control"
                                placeholder="Jabatan di Perusahaan"
                                value="{{ $user->jabatan }}">
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