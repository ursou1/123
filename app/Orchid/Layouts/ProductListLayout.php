<?php

namespace App\Orchid\Layouts;

use App\Models\Product;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class ProductListLayout extends Table
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
    public $target = 'products';

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
                ->render(function (Product $product) {
                    return Link::make($product->title)
                        ->route('platform.product.edit', $product);
                }),
            TD::make('cost', 'Cost')
                ->sort(),
            TD::make('category_id', 'Category')
                ->render(function (Product $product){
                    return $product->presenter()->categoryName();
                })
                ->sort(),
            TD::make('image', 'Image')
                ->render(function (Product $product){
                    return "<img src='{$product->image}'
                              alt='sample'
                              class='mw-100 d-block img-fluid img-thumbnail'>";
            }),

           /* TD::make('created_at', 'Created')
                ->sort(),

            TD::make('updated_at', 'Last edit')
                ->sort(),*/

        ];
    }
}
