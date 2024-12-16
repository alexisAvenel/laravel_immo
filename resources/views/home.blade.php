@extends('base')
@section('title', 'Accueil')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">IMMOAGENCY, au cœur du quartier<br>pour mieux vous conseiller</h1>
                <p class="lead text-body-secondary">Experts dans les domaines de l’achat, de la vente et de la location
                    de biens, de gestion locative et de syndic de copropriété à Rouen et ses alentours, Sauvage
                    Immobilier saura répondre à tous vos besoins.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <h2>Nos derniers biens en vente</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">
                @foreach($properties as $property)
                    <div class="col">
                        <div class="card shadow-sm" @style(['--cui-card-height: 100%'])>
                            @empty($property->medias)
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Photo indisponible</text>
                                </svg>
                            @else
                                <img src="{{$property->medias()->first()->imageUrl()}}"
                                     width="100%"
                                     height="225"
                                     class="bd-placeholder-img card-img-top object-fit-cover"
                                     alt="{{$property->title}}">
                            @endempty
                            <div class="card-body">
                                <p class="card-text">{{Str::limit($property->description, 100)}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a role="button"
                                           href="{{route('properties.show', ['property' => $property])}}"
                                           class="btn btn-sm btn-outline-secondary">Voir le détail du bien
                                        </a>
                                        @auth()
                                            <a role="button"
                                               href="{{route('admin.properties.edit', ['property' => $property])}}"
                                               class="btn btn-sm btn-outline-secondary">Éditer
                                            </a>
                                        @endauth
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <hr class="border-danger">

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <h2>Nos derniers biens vendus</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">
                @foreach($soldProperties as $soldProperty)
                    <div class="col">
                        <div class="card shadow-sm" @style(['--cui-card-height: 100%'])>
                            @empty($soldProperty->medias)
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Photo indisponible</text>
                                </svg>
                            @else
                                <img src="{{$soldProperty->medias()->first()->imageUrl()}}"
                                     width="100%"
                                     height="225"
                                     class="bd-placeholder-img card-img-top object-fit-cover"
                                     alt="{{$soldProperty->title}}">
                            @endempty
                            <div class="card-body">
                                <p class="card-text">{{Str::limit($soldProperty->description, 100)}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a role="button"
                                           href="{{route('properties.show', ['property' => $soldProperty])}}"
                                           class="btn btn-sm btn-outline-secondary">Voir le détail du bien
                                        </a>
                                        @auth()
                                            <a role="button"
                                               href="{{route('admin.properties.edit', ['property' => $soldProperty])}}"
                                               class="btn btn-sm btn-outline-secondary">Éditer
                                            </a>
                                        @endauth
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
