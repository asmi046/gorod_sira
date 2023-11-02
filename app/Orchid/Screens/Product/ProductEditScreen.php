<?php

namespace App\Orchid\Screens\Product;

use Orchid\Screen\Screen;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Celebration;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Color;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Actions\ModalToggle;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class ProductEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

     public $product;
     public $product_cat;

    public function query($id): iterable
    {
        $product = Product::where('id',$id)->first();
        $cat = $product->product_category;

        return [
            "product" => $product,
            "product_cat"=> $cat,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование продукта: '.$this->product->title;
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [


            Layout::rows([
                Input::make('price_D_ht')->type('hidden'),
                Input::make('price_D_kg')->type('hidden'),
                Input::make('price_OPT_ht')->type('hidden'),
                Input::make('price_OPT_kg')->type('hidden'),
                Input::make('price_R_ht')->type('hidden'),
                Input::make('price_R_kg')->type('hidden'),

                Input::make('sku')
                    ->title('Артикул')
                    ->value($this->product->sku)
                    ->help('Артикул уникальный для каждого товара')
                    ->required()
                    ->horizontal(),

                Input::make('title')
                    ->title('Заголовок')
                    ->value($this->product->title)
                    ->help('Заголовок категории')
                    ->required()
                    ->horizontal(),

                Input::make('slug')
                    ->title('Окончание ссылки')
                    ->value($this->product->slug)
                    ->help('Slug категории')
                    ->horizontal(),

                Input::make('tm')
                    ->title('Товарная марка')
                    ->value($this->product->tm)
                    ->help('Товарная марка')
                    ->required()
                    ->horizontal(),

                Input::make('upacovka')
                    ->title('Упаковка')
                    ->value($this->product->upacovka)
                    ->help('Диаметр букета')
                    ->required()
                    ->horizontal(),


                Quill::make('quote')->title('Цитата')->value($this->product->quote),
                Quill::make('description')->required()->title('Описание')->value($this->product->description),

                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Основные поля'),

            Layout::rows([
                Relation::make('category')
                    ->fromModel(Category::class, 'title', 'title')
                    ->title('Категории товара')
                    ->value($this->product_cat)
                    ->required()
                    ->help('Выберите категорию'),

                Input::make('category_sub')
                    ->title('Подкатегория товара')
                    ->value($this->product->category_sub)
                    ->help('Подкатегория товара')
                    ->horizontal(),

                Input::make('order')
                    ->type('number')
                    ->title('Порядок сортировки')
                    ->value($this->product->order)
                    ->help('Порядок сортировки при выводе в категории')
                    ->horizontal(),


                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Категория товара'),

            Layout::rows([

                Input::make('param_zgirnost')
                    ->title('Жирность')
                    ->value($this->product->param_zgirnost)
                    ->help('Укажите Жирность')
                    ->horizontal(),

                Input::make('param_scode')
                    ->title('Штрихкод')
                    ->value($this->product->param_scode)
                    ->help('Укажите Штрихкод')
                    ->horizontal(),

                Input::make('param_ves_ed')
                    ->title('Вес единицы товара')
                    ->value($this->product->param_ves_ed)
                    ->help('Укажите Вес единицы товара')
                    ->horizontal(),

                Input::make('param_ves_yashik')
                    ->title('Вес ящика товара')
                    ->value($this->product->param_ves_yashik)
                    ->help('Укажите Вес ящика товара')
                    ->horizontal(),

                Input::make('param_count_in_pack')
                    ->title('Колличество в ящике')
                    ->value($this->product->param_count_in_pack)
                    ->help('Укажите Колличество в ящике')
                    ->horizontal(),

                Input::make('param_srok_realiz')
                    ->title('Срок реализации')
                    ->value($this->product->param_srok_realiz)
                    ->help('Укажите Срок реализации')
                    ->horizontal(),

                    Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())

            ])->title('Параметры товара'),

            Layout::rows([
                Input::make('seo_title')
                    ->title('SEO заголовок')
                    ->value($this->product->seo_title)
                    ->help('SEO заголовок')
                    ->horizontal(),

                TextArea::make('seo_description')
                    ->title('SEO описание')
                    ->value($this->product->seo_description)
                    ->help('SEO описание')
                    ->horizontal(),
                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('SEO поля'),

            Layout::rows([

                Picture::make('img')->title('Загрузить основное изображение записи')->storage('public')->targetRelativeUrl()->value($this->product->img),

                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Изображения'),

        ];
    }


    public function save_info(Product $product, Request $request) {

        // dd($request->get("category"));

        $new_data = $request->validate([
            'sku' => ['required', 'string',  Rule::unique('products')->ignore($product->id)],
            'title' => ['required', 'string'],
            'slug' => [],
            'tm' => ['required', 'string'],
            'upacovka' => ['required', 'string'],
            'quote' => [],
            'order' => [],

            'param_zgirnost' => [],
            'param_scode' => [],
            'param_ves_ed' => [],
            'param_ves_yashik' => [],
            'param_count_in_pack' => [],
            'param_srok_realiz' => [],

            'category' => ['required', 'string'],
            'category_sub' => [],
            'img' => [],
            'description' => ['required', 'string'],

            'price_D_ht' => [],
            'price_D_kg' => [],

            'price_OPT_ht' => [],
            'price_OPT_kg' => [],

            'price_R_ht' => [],
            'price_R_kg' => [],

            'seo_title' => [],
            'seo_description' => [],
        ]);

        Product::where('id', $product->id)->update($new_data);
        Toast::info("Продукт сохранен");
    }
}
