<?php

namespace App\Orchid\Screens\Product;

use Orchid\Screen\Screen;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;

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

use App\Orchid\Layouts\Product\ProductImageTable;

use Illuminate\Http\Request;

class ProductCreateScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public function query(): iterable
    {
        return [];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Создание товара';
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
                    ->help('Артикул уникальный для каждого товара')
                    ->required()
                    ->horizontal(),

                Input::make('title')
                    ->title('Заголовок')
                    ->help('Заголовок категории')
                    ->required()
                    ->horizontal(),

                Input::make('slug')
                    ->title('Окончание ссылки')
                    ->help('Slug категории')
                    ->horizontal(),

                Input::make('tm')
                    ->title('Товарная марка')
                    ->help('Товарная марка')
                    ->required()
                    ->horizontal(),

                Input::make('upacovka')
                    ->title('Упаковка')
                    ->help('Диаметр букета')
                    ->required()
                    ->horizontal(),


                Quill::make('quote')->title('Цитата'),
                Quill::make('description')->required()->title('Описание'),

                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Основные поля'),

            Layout::rows([
                Relation::make('category')
                    ->fromModel(Category::class, 'title', 'title')
                    ->title('Категории товара')
                    ->required()
                    ->help('Выберите категорию'),

                Input::make('category_sub')
                    ->title('Подкатегория товара')
                    ->help('Подкатегория товара')
                    ->horizontal(),

                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Категория товара'),

            Layout::rows([

                Input::make('param_zgirnost')
                    ->title('Жирность')
                    ->help('Укажите Жирность')
                    ->horizontal(),

                Input::make('param_scode')
                    ->title('Штрихкод')
                    ->help('Укажите Штрихкод')
                    ->horizontal(),

                Input::make('param_ves_ed')
                    ->title('Вес единицы товара')
                    ->help('Укажите Вес единицы товара')
                    ->horizontal(),

                Input::make('param_ves_yashik')
                    ->title('Вес ящика товара')
                    ->help('Укажите Вес ящика товара')
                    ->horizontal(),

                Input::make('param_count_in_pack')
                    ->title('Колличество в ящике')
                    ->help('Укажите Колличество в ящике')
                    ->horizontal(),

                Input::make('param_srok_realiz')
                    ->title('Срок реализации')
                    ->help('Укажите Срок реализации')
                    ->horizontal(),

                    Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())

            ])->title('Параметры товара'),

            Layout::rows([
                Input::make('seo_title')
                    ->title('SEO заголовок')
                    ->help('SEO заголовок')
                    ->horizontal(),

                TextArea::make('seo_description')
                    ->title('SEO описание')
                    ->help('SEO описание')
                    ->horizontal(),
                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('SEO поля'),

            Layout::rows([

                Picture::make('img')->title('Загрузить основное изображение записи')->storage('public')->targetRelativeUrl(),

                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('Изображения'),

        ];
    }

    public function save_info(Request $request) {

        $new_data = $request->validate([
            'sku' => ['required', 'string',  Rule::unique('products')->ignore(Product::class)],
            'title' => ['required', 'string'],
            'slug' => [],
            'tm' => ['required', 'string'],
            'upacovka' => ['required', 'string'],
            'quote' => [],

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


        $new_tovar = Product::create($new_data);

        Toast::info("Товар добавлен");
        return redirect()->route('platform.product');
    }
}
