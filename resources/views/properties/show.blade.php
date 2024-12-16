@extends('base')
@section('title', 'Accueil')
@section('content')
    <section class="py-5 text-center container bg-light-gradient shadow-sm">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{$property->title}}</h1>
                <h2 class="text-primary">{{Number::currency($property->price, in: 'EUR', locale: 'fr')}}</h2>
            </div>
        </div>
    </section>

    <div class="py-5 mt-4 bg-body-tertiary">
        <div class="container">
            <div class="row" data-masonry='{"percentPosition": true }'>
                @foreach($property->medias as $media)
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <img src="{{$media->imageUrl()}}" alt="Photo" class="img-fluid">
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                <p>{!! nl2br($property->description) !!}</p>
                <div class="row">
                    <div class="col-8">
                        <h2>Caractéristiques</h2>
                        <table class="table table-striped">
                            <tr>
                                <td><strong>Surface: </strong>{{$property->area}}m²</td>
                            </tr>
                            <tr>
                                <td><strong>Pièces: </strong>{{$property->pieces}}</td>
                            </tr>
                            <tr>
                                <td><strong>Chambres: </strong>{{$property->rooms}}</td>
                            </tr>
                            <tr>
                                <td><strong>Étages: </strong>{{$property->stage}}</td>
                            </tr>
                            <tr>
                                <td><strong>Adresse: </strong>{{$property->getFullAddress()}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-4">
                        <h4>Intéressé par ce bien ?</h4>
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <form action="{{route('properties.contact', $property)}}" method="post" class="vstack gap-3">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group form-floating">
                                        <input class="@error('firstname') is-invalid @else is-valid @enderror form-control" type="text" name="firstname" id="firstname">
                                        <label for="firstname">Prénom</label>
                                        @error('firstname')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-floating">
                                        <input class="@error('lastname') is-invalid @else is-valid @enderror form-control" type="text" name="lastname" id="lastname">
                                        <label for="lastname">Nom</label>
                                        @error('lastname')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group form-floating">
                                        <input class="@error('email') is-invalid @else is-valid @enderror form-control" type="email" name="email" id="email">
                                        <label for="email">Email</label>
                                        @error('email')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-floating">
                                        <input class="@error('phone') is-invalid @else is-valid @enderror form-control" type="tel" name="phone" id="phone">
                                        <label for="phone">Téléphone</label>
                                        @error('phone')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group form-floating">
                                        <textarea class="@error('message') is-invalid @else is-valid @enderror form-control" name="message" id="message" cols="30"
                                                  rows="10"></textarea>
                                        <label for="message">Votre message</label>
                                        @error('message')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary">Nous contacter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
