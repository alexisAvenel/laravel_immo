@extends('admin.base')
@section('title', 'Liste des options de bien')
@section('content')
    <div class="h-100 p-2 bg-dark border rounded-3"
         style="--cui-bg-opacity: .025;">
        <div class="d-flex align-items-center justify-content-between">
            <h2>Liste des options de bien</h2>
            <a href="{{route('admin.options.new')}}"
               class="btn btn-success text-white">
                Créer une option
            </a>
        </div>
        <table class="table table-striped my-3">
            <thead>
            <tr class="fw-bold">
                <td>Nom</td>
                <td class="text-center">Icon</td>
                <td class="text-end">&nbsp;</td>
            </tr>
            </thead>
            @foreach($options as $option)
                <tr>
                    <td>{{$option->name}}</td>
                    <td class="text-center">
                        <span class="d-flex align-items-center justify-content-center gap-2">
                            @if($option->icon)
                                <i class="bi bi-{{$option->icon}} fs-3"></i>
                            @endif
                            <span>[{{$option->icon}}]</span>
                        </span>
                    </td>
                    <td class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{route('admin.options.edit', $option)}}"
                           title="Éditer"
                           class="btn btn-link text-info p-0">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{route('admin.options.delete', $option)}}" method="post">
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
        {{$options->links()}}
    </div>
@endsection
