@extends('layout')

@section('content')
    <main class="signup-form w-100 m-auto">
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {!! Session::get('success') !!}
        </div>
        @endif
        <h1>Dashboard</h1>
    </main>
@endsection
