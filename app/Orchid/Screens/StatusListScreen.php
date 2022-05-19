<?php

namespace App\Orchid\Screens;

use App\Models\Category;
use App\Models\Status;
use App\Orchid\Layouts\CategoryListLayout;
use App\Orchid\Layouts\StatusListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class StatusListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [ 'statuses' => Status::filters()->defaultSort('id')->paginate()];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'StatusListScreen';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [  Link::make('Create new')
            ->icon('pencil')
            ->route('platform.status.edit')];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
          StatusListLayout::class
        ];
    }
}
