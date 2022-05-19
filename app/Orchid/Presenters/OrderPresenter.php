<?php

namespace App\Orchid\Presenters;

use Orchid\Support\Presenter;

class OrderPresenter extends Presenter
{
    public function userEmail(): string
    {
        return $this->entity->user->email;
    }
    public function statusTitle(): string
    {
        return $this->entity->status->title;
    }
}
