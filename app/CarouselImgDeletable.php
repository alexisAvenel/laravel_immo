<?php

namespace App;

class CarouselImgDeletable
{
    protected ?bool $active;
    protected ?bool $confirm;
    protected ?string $confirmText;

    public function __construct(
        ?bool   $active = false,
        ?bool   $confirm = false,
        ?string $confirmText = 'Confirmez-vous la suppression de cette image ?'
    )
    {
        $this->active = $active;
        $this->confirm = $confirm;
        $this->confirmText = $confirmText;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    public function getConfirm(): ?bool
    {
        return $this->confirm;
    }

    public function setConfirm(?bool $confirm): void
    {
        $this->confirm = $confirm;
    }

    public function getConfirmText(): ?string
    {
        return $this->confirmText;
    }

    public function setConfirmText(?string $confirmText): void
    {
        $this->confirmText = $confirmText;
    }
}
