<?php

namespace App\Orchid\Screens;

use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class StatusEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @param Status $status
     *
     * @return array
     */
    public function query(Status $status): array
    {
        $this->exists = $status->exists;

        if($this->exists){
            $this->name = 'Edit status';
        }


        return [
            'status' => $status
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'StatusEditScreen';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return[
        Button::make('Create status')
        ->icon('pencil')
        ->method('createOrUpdate')
        ->canSee(!$this->exists),

        Button::make('Update')
            ->icon('note')
            ->method('createOrUpdate')
            ->canSee($this->exists),

        Button::make('Remove')
            ->icon('trash')
            ->method('remove')
            ->canSee($this->exists),

        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [Layout::rows([
            Input::make('status.title')
                ->title('Title')
                ->placeholder('Attractive but mysterious title'),
        ])];
    }


    /**
     * @param Status $status
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Status $status, Request $request)
    {
        $status->fill($request->get('status'))->save();

        Alert::info('You have successfully created an status.');

        return redirect()->route('platform.status.list');
    }
    /**
     * @param Status $status
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Status $status)
    {
        $status->delete();

        Alert::info('You have successfully deleted the status.');

        return redirect()->route('platform.status.list');
    }
}
