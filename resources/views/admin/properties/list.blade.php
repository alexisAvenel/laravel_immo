@extends('admin.base')
@section('title', 'Liste des biens')
@section('content')
    <div class="h-100 p-2 bg-body-tertiary border rounded-3">
        <div class="d-flex align-items-center justify-content-between">
            <h2>Liste des biens</h2>
            <a href="{{route('admin.properties.new')}}"
               class="btn btn-success text-white">
                Créer un bien
            </a>
        </div>
        <table class="table table-striped my-3">
            <thead>
            <tr class="fw-bold">
                <td>Titre</td>
                <td class="text-center">Lieu</td>
                <td class="text-center">Prix</td>
                <td class="text-center">Vendu ?</td>
                <td class="text-end">&nbsp;</td>
            </tr>
            </thead>
            @foreach($properties as $property)
                <tr>
                    <td>{{$property->title}}</td>
                    <td class="text-center">{{$property->city}} ({{$property->zip}})</td>
                    <td class="text-center">{{Number::currency($property->price, in: 'EUR', locale: 'fr')}}</td>
                    <td class="text-center">
                        <i @class([
                                    'bi',
                                    'bi-check2-circle text-success' => $property->sold,
                                    'bi-x-circle text-danger' => !$property->sold
                                    ])></i>
                    </td>
                    <td class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{route('admin.properties.edit', ['property' => $property])}}"
                           title="Éditer"
                           class="btn btn-link text-info p-0">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{route('admin.properties.delete', $property)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-link text-danger p-0"
                            ><i class="bi bi-trash2"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$properties->links()}}
    </div>
@endsection
