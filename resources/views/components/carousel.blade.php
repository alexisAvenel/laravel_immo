<div id="propertyMediaIndicators"
     data-coreui-ride="true"
    @class(['carousel','slide',$class])>
    <div class="carousel-indicators">
        @foreach($medias as $media)
            <button type="button"
                    data-coreui-target="#propertyMediaIndicators"
                    data-coreui-slide-to="{{$loop->index}}"
                    class="@if ($loop->first) active @endif"
                    aria-current="true"
                    aria-label="Slide {{$loop->index}}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($medias as $media)
            <div class="@if ($loop->first) active @endif carousel-item">
                <img src="{{$media->imageUrl()}}" class="d-block w-100" alt="...">
                @if($carouselImgDeletable->getActive())
                    <button
                        type="button"
                        data-csrf="{{ csrf_token() }}"
                        data-confirm="{{$carouselImgDeletable->getConfirm()}}"
                        data-action="{{route('admin.media.delete', ['media' => $media])}}"
                        class="carousel-item-delete icon-link icon-link-hover border-0 bg-transparent text-danger">
                        <i class="bi bi-trash3-fill"
                           style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);"></i>
                    </button>
                @endif
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-coreui-target="#propertyMediaIndicators"
            data-coreui-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-coreui-target="#propertyMediaIndicators"
            data-coreui-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@if($carouselImgDeletable->getActive() && $carouselImgDeletable->getConfirm())
    <x-modal-confirm :modalTitle="'Confirmation'"
                     :modalMessage="'Souhaitez-vous réellement supprimer cette image?'"
                     :modalBtnSave="'Je confirme'"></x-modal-confirm>
@endif
