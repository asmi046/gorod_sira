<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Filters\Filterable;

use Illuminate\Support\Str;

use Orchid\Screen\AsSource;

class Product extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    public $fillable = [
            'sku',
            'title',
            'slug',
            'tm',
            'upacovka',
            'quote',
            'order',

            'param_zgirnost',
            'param_scode',
            'param_ves_ed',
            'param_ves_yashik',
            'param_count_in_pack',
            'param_srok_realiz',

            'category',
            'category_sub',
            'img',
            'description',

            'price_D_ht',
            'price_D_kg',

            'price_OPT_ht',
            'price_OPT_kg',

            'price_R_ht',
            'price_R_kg',

            'seo_title',
            'seo_description',
            'created_at'
    ];

    protected $allowedSorts = [
        'id',
        'sku',
        'title',
        'order',
        'created_at'
    ];

    protected $allowedFilters  = [
        'title'
    ];

    public function product_category() {
        return $this->hasOne(Category::class, "title", "category");
    }

    public function setSlugAttribute($value)
    {
        if (empty($value))
            $this->attributes['slug'] =  Str::slug($this->title);
        else
            $this->attributes['slug'] =  $value;
    }
}
