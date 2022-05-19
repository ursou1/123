<?php

namespace App\Orchid\Layouts;
use App\Models\Order;
use App\Models\Product;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class OrderListLayout extends Table
{
    /**
     * Name of columns to which http filter can be applied
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
    ];

    /**
     * Data source.
     *
     * @var string
     */
    public $target = 'orders';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id', 'Id')
                ->render(function (Order $order) {
                    return Link::make($order->id)
                        ->route('platform.order.edit', $order);
                })
                ->sort(),
            TD::make('order_date', 'Date')
                ->sort(),
            TD::make('user_id', 'User')
                ->render(function (Order $order){
                    return $order->presenter()->userEmail();
                })
                ->sort(),
            TD::make('status_id', 'Status')
                ->render(function (Order $order){
                    return $order->presenter()->statusTitle();
                })
                ->sort(),
        ];
    }
}
