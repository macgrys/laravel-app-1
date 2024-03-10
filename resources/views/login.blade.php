@extends('layout')

@section('content')
    <main class="signup-form w-100 m-auto">
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {!! Session::get('success') !!}
        </div>
        @endif
        @if (Session::has('failure'))
        <div class="alert alert-danger" role="alert">
            {!! Session::get('failure') !!}
        </div>
        @endif
        <form method="post" action="{{url('login')}}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Logowanie</h1>
            <div class="form-floating mb-1">
                <input type="email" class="form-control" placeholder="Email" id="inputEmail" name="inputEmail" />
                <label for="inputEmail">Adres email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" placeholder="Password" id="inputPassword" name="inputPassword" />
                <label for="inputPassword">Hasło</label>
            </div>
            <button class="btn btn-primary w-100 py-2 mb-2" type="submit">Zaloguj się</button>
            <a href="{{ url('/register') }}" class="btn btn-outline-primary w-100 py-2">Zarejestruj się</a>
        </form>
    </main>
@endsection
