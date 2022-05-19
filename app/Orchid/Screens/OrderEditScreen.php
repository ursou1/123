<?php

namespace App\Orchid\Screens;

use App\Models\Category;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Status;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class OrderEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @param Order $order
     *
     * @return array
     */
    public function query(Order $order): array
    {
        $this->exists = $order->exists;

        if($this->exists){
            $this->name = 'Order';
        }


        return [
            'order' => $order,
            'sales' => $order->sales(),

        ];

    }
    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'OrderEditScreen';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [Button::make('Update')
            ->icon('note')
            ->method('createOrUpdate')
            ->canSee($this->exists),];
    }


    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [

            Layout::rows([
                Relation::make('order.status_id')
                    ->title('Status')
                    ->fromModel(Status::class, 'title'),
        ]),

         Layout::table('sales', [
                TD::make('id', 'id'),

            ]),

        ];
    }
    /**
     * @param Order $order
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Order $order, Request $request)
    {
        $order->fill($request->get('order'))->save();

        Alert::info('You have successfully created an post.');

        return redirect()->route('platform.order.list');
    }

}
