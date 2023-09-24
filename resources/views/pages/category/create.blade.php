@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-white">
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Label Kategori</label>
                            <input
                                type="text"
                                name="name"
                                id="categoryName"
                                class="form-control"
                                placeholder="Label Kategori">
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