<form action=""
      method="post"
      class="form needs-validation"
      enctype="multipart/form-data">
    @csrf
    @method($property->id ? 'PATCH' : 'POST')
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-12">
                    <div class="form-group form-floating mb-3">
                        <input type="text"
                               name="title"
                               id="title"
                               value="{{old('title', $property->title)}}"
                               placeholder="Saisir un titre"
                               class="@error('title') is-invalid @else is-valid @enderror form-control required">
                        <label for="title">Saisir un titre</label>
                        @error('title')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-floating mb-3">
                        <textarea name="description"
                                  style="height: 200px"
                                  id="description"
                                  class="@error('description') is-invalid @else is-valid @enderror form-control"
                                  placeholder="Description">{{old('description', $property->description)}}</textarea>
                        <label for="description">Description</label>
                        @error('description')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-floating mb-3">
                        <input type="text"
                               name="address"
                               id="address"
                               value="{{old('address', $property->address)}}"
                               placeholder="Saisir une adresse"
                               class="@error('address') is-invalid @else is-valid @enderror form-control">
                        <label for="description">Saisir une adresse</label>
                        @error('address')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-floating mb-3">
                        <input type="number"
                               maxlength="5"
                               name="zip"
                               id="zip"
                               value="{{old('zip', $property->zip)}}"
                               placeholder="Saisir un code postal"
                               class="@error('zip') is-invalid @else is-valid @enderror form-control">
                        <label for="zip">Saisir un code postal</label>
                        @error('zip')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-floating mb-3">
                        <input type="text"
                               name="city"
                               id="city"
                               value="{{old('city', $property->city)}}"
                               placeholder="Saisir une ville"
                               class="@error('city') is-invalid @else is-valid @enderror form-control">
                        <label for="city">Saisir une ville</label>
                        @error('city')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-floating mb-3">
                        <input type="number"
                               step=".01"
                               name="area"
                               id="area"
                               value="{{old('area', $property->area)}}"
                               placeholder="Saisir une surface habitable (m2)"
                               class="@error('area') is-invalid @else is-valid @enderror form-control">
                        <label for="area">Saisir une surface habitable (m2)</label>
                        @error('area')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-floating mb-3">
                        <input type="number"
                               name="pieces"
                               id="pieces"
                               value="{{old('pieces', $property->pieces)}}"
                               placeholder="Saisir un nombre de pièce"
                               class="@error('pieces') is-invalid @else is-valid @enderror form-control">
                        <label for="pieces">Saisir un nombre de pièce</label>
                        @error('pieces')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-floating mb-3">
                        <input type="number"
                               name="rooms"
                               id="rooms"
                               value="{{old('rooms', $property->rooms)}}"
                               placeholder="Saisir un nombre de chambre"
                               class="@error('rooms') is-invalid @else is-valid @enderror form-control">
                        <label for="rooms">Saisir un nombre de chambre</label>
                        @error('rooms')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-floating mb-3">
                        <input type="number"
                               name="stage"
                               id="stage"
                               value="{{old('stage', $property->stage)}}"
                               placeholder="Nombre d'étage"
                               class="@error('stage') is-invalid @else is-valid @enderror form-control">
                        <label for="stage">Nombre d'étage</label>
                        @error('stage')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-floating mb-3">
                        <input type="number"
                               step=".01"
                               name="price"
                               id="price"
                               value="{{old('price', $property->price)}}"
                               placeholder="Saisir un prix"
                               class="@error('price') is-invalid @else is-valid @enderror form-control">
                        <label for="price">Saisir un prix</label>
                        @error('price')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="row">
                <div class="col-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input"
                               type="checkbox"
                               role="switch"
                               name="sold"
                               value="1"
                               id="sold"
                            @checked(old('sold', $property->sold))>
                        <label class="form-check-label"
                               for="sold">Vendu ?</label>
                        @error('sold')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group my-3 border border-danger px-2 py-3 rounded"
                         style="--cui-border-style: dashed;">
                        <label class="form-label fw-bold" for="medias">Photos du bien</label>
                        <input type="file"
                               multiple
                               name="medias[]"
                               id="medias"
                               placeholder="Choisir une ou plusieurs images"
                               class="form-control">
                        @isset($medias)
                            <x-carousel
                                :medias="$medias"
                                :class="'mt-3'"
                                :carouselImgDeletable="$canDeleteImg"></x-carousel>
                        @endisset
                        @error('medias')
                        <div class="alert alert-danger my-2">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    @php
                        $optionIds = $property->options()->get()->pluck('id');
                    @endphp
                    <div class="form-group my-3">
                        <select class="form-multi-select"
                                id="ms-options"
                                name="options[]"
                                multiple
                                data-coreui-search="true">
                            @foreach($options as $option)
                                <option value="{{$option->id}}"
                                    @selected($optionIds->contains($option->id))>{{$option->name}}</option>
                            @endforeach
                        </select>
                        @error('options')
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
