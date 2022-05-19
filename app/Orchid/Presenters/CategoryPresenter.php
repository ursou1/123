<?php

namespace App\Orchid\Presenters;

use Orchid\Support\Presenter;

class CategoryPresenter extends Presenter
{
    public function categoryName(): string
    {
        return $this->entity->category->title;
    }
}
