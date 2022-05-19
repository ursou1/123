<?php

namespace App\Orchid\Layouts;
use App\Models\Status;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class StatusListLayout extends Table
{
    /**
     * Name of columns to which http filter can be applied
     *
     * @var array
     */
    protected $allowedFilters = [
        'title',
    ];

    /**
     * Data source.
     *
     * @var string
     */
    public $target = 'statuses';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id', 'Id')
                ->sort(),
            TD::make('title', 'Title')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Status $status) {
                    return Link::make($status->title)
                        ->route('platform.status.edit', $status);
                }),
        ];
    }
}
