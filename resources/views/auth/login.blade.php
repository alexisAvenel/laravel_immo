@extends('base')
@section('content')
    <div class="form-signin w-100 m-auto">
        <form action="{{route('login')}}" method="post" class="text-center">
            @csrf
            <img class="mb-4 img-fluid" src="{{Storage::disk('public')->url('/images/logo.svg')}}" alt="" width="200">
            <h1 class="h3 mb-3 fw-normal">Connexion à l'admin</h1>

            <div class="form-floating">
                <input type="email"
                       name="email"
                       class="form-control"
                       id="floatingInput"
                       placeholder="name@example.com"
                       value="{{old('email')}}">
                <label for="floatingInput">Email</label>
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password"
                       name="password"
                       class="form-control"
                       id="floatingPassword"
                       placeholder="Password">
                <label for="floatingPassword">Mot de passe</label>
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Se souvenir de moi
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Se connecter</button>
            <a href="{{route('home')}}" title="Retour à l'accueil" class="small text-decoration-underline mt-1"><i
                    class="bi bi-arrow-left"></i> Retour à l'accueil</a>
            <p class="mt-5 mb-3 text-body-secondary">&copy; {{date('Y')}}</p>
        </form>
    </div>
@endsection
