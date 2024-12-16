<?php

namespace App\View\Components;

use App\CarouselImgDeletable;
use App\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Carousel extends Component
{
    /**
     * Create a new component instance.
     * @var Media[] $medias
     * @var string $class
     * @var CarouselImgDeletable $carouselImgDeletable
     */
    public function __construct(
        public Collection            $medias,
        public string                $class,
        public ?CarouselImgDeletable $carouselImgDeletable = new CarouselImgDeletable(),
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.carousel');
    }
}
