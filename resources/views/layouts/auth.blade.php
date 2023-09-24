@extends('layouts.app')

@section('structure')
    <div class="w-100">
        @include('includes.navbar')

        <main class="py-4">
                @yield('content')
        </main>
    </div>
@endsection