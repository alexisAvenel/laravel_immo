<form action=""
      method="post"
      class="form needs-validation">
    @csrf
    @method($option->id ? 'PATCH' : 'POST')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="form-group form-floating mb-3">
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{old('name', $option->name)}}"
                               placeholder="Saisir un nom"
                               class="@error('name') is-invalid @else is-valid @enderror form-control required">
                        <label for="name">Saisir un nom</label>
                        @error('name')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-3">
                        <select class="form-multi-select"
                                id="ms-icon"
                                name="icon"
                                data-coreui-selection-type="text"
                                data-coreui-search="true"
                                data-coreui-multiple="false">
                            <option value="">Choisir un icon</option>
                            @foreach($bootstrapIcons as $key => $icon)
                                <option @selected($key == $option->icon) value="{{$key}}" data-icon="bi-{{$key}}">
                                    {{$key}}
                                </option>
                            @endforeach
                        </select>
                        @error('icon')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary">Enregistrer</button>
        </div>
    </div>
</form>
