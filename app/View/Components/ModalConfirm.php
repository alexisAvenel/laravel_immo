<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalConfirm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $modalTitle = 'Modal title',
        public string $modalMessage = 'Modal message',
        public string $modalBtnClose = 'Fermer',
        public string $modalBtnSave = 'Enregistrer',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-confirm');
    }
}
