<?php

namespace App\Providers;

use App\View\Components\Carousel;
use App\View\Components\ModalConfirm;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        JsonResource::withoutWrapping();
        Blade::component('carousel', Carousel::class);
        Blade::component('modal-confirm', ModalConfirm::class);
    }
}
