@extends('admin.base')
@section('title', 'Création d\'un bien')
@section('content')
    <div class="pt-3 pb-2 mb-3">
        <h1>Création d'un bien</h1>
        @include('admin.properties.form')
    </div>
@endsection