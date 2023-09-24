@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-white">
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Label</label>
                            <input
                                type="text"
                                name="name"
                                id="categoryName"
                                class="form-control"
                                value="{{ $category->name }}"
                                placeholder="Category Label">
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