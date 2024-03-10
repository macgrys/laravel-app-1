@extends('layout')

@section('content')
    <main class="signup-form w-100 m-auto">
        <form method="post" action="{{url('register')}}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Rejestracja</h1>
            <div class="form-floating mb-1">
                <input type="email" class="form-control" placeholder="Email" id="inputEmail" name="inputEmail" />
                <label for="inputEmail">Adres email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" placeholder="Password" id="inputPassword" name="inputPassword" />
                <label for="inputPassword">Hasło</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Zarejestruj się</button>
        </form>
    </main>
@endsection

