<?php

namespace App\Orchid\Screens;
use App\Models\Product;
use Orchid\Attachment\File;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Picture;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class ProductEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Creating a new product';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Products';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @param Product $product
     *
     * @return array
     */
    public function query(Product $product): array
    {
        $this->exists = $product->exists;

        if($this->exists){
            $this->name = 'Edit product';
        }

        $product->load('attachment');

        return [
            'product' => $product
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'ProductEditScreen';
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Create product')
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
    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('product.title')
                    ->title('Title')
                    ->placeholder('Attractive but mysterious title'),


                TextArea::make('product.description')
                    ->title('Description')
                    ->rows(3)
                    ->maxlength(200)
                    ->placeholder('Brief description for preview'),

                Relation::make('product.category_id')
                    ->title('Category')
                    ->fromModel(Category::class, 'title'),
                Input::make('product.cost')
                    ->title('Cost')
                    ->placeholder('Attractive but mysterious title'),
              //  Quill::make('product.body')
                   // ->title('Main text'),
                Picture::make('product.image')
                    ->title('All files')
            ])
            ];

    }
    /**
     * @param Product    $product
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Product $product, Request $request)
    {
        $product->fill($request->get('product'))->save();

        $product->attachment()->syncWithoutDetaching(
            $request->input('product.attachment',[])
        );

        Alert::info('You have successfully created an post.');

        return redirect()->route('platform.product.list');
    }
    /**
     * @param Product $product
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Product $product)
    {
        $product->delete();

        Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.product.list');
    }
}
