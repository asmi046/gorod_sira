<?php

namespace App\Orchid\Screens\Category;

use Orchid\Screen\Screen;

use App\Models\Category;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Color;

use Orchid\Screen\Fields\Picture;

use Illuminate\Http\Request;

use Orchid\Screen\Fields\TextArea;

class CategoryEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

     public $category;

    public function query($id): iterable
    {
        return [
            "category" => Category::where('id',$id)->first()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование категории: '.$this->category->title;
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

                Input::make('name')->type('hidden'),

                Input::make('title')
                    ->title('Заголовок')
                    ->value($this->category->title)
                    ->help('Заголовок категории')
                    ->required()
                    ->horizontal(),

                Input::make('slug')
                    ->title('Окончание ссылки')
                    ->value($this->category->slug)
                    ->help('Slug категории')
                    ->horizontal(),

                Picture::make('img')->title('Загрузить основное изображение записи')->storage('public')->targetRelativeUrl()->value($this->category->img),

                Quill::make('quote')->title('Цитата')->value($this->category->quote),
                Quill::make('description')->title('Описание')->value($this->category->description),

                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ]),

            Layout::rows([
                Input::make('seo_title')
                    ->title('SEO заголовок')
                    ->value($this->category->seo_title)
                    ->help('SEO заголовок')
                    ->horizontal(),

                TextArea::make('seo_description')
                    ->title('SEO описание')
                    ->value($this->category->seo_description)
                    ->help('SEO описание')
                    ->horizontal(),
                Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
            ])->title('SEO поля')
        ];
    }

    public function save_info(Category $category, Request $request) {

        $new_data = $request->validate([
            'title' => ['required', 'string'],
            'name' => [],
            'slug' => [],
            'description' => [],
            'img' => [],
            'quote' => [],
            'seo_title' => [],
            'seo_description' => []
        ]);


        Category::where('id', $category->id)->update($new_data);
        Toast::info("Категория сохранена");
    }
}
