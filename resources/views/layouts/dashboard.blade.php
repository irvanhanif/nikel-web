@extends('layouts.app')

@push('addon-style')
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush

@section('structure')
    @include('includes.sidebar')

    <main>
        @include('includes.navbar')
        <div class="py-4">
            @yield('content')
        </div>
    </main>

    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
    @stack('addon-script')

@endsection
