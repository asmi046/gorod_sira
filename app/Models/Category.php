<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

use Orchid\Screen\AsSource;

class Category extends Model
{
    use HasFactory;
    use AsSource;

    public $fillable = [
        'name',
        'title',
        'slug',
        'img',
        'quote',
        'order',
        'description',
        'seo_title',
        'seo_description',
    ];

    public function cat_product() {
        return $this->hasMany(Product::class, "category", "title");
    }


    public function setSlugAttribute($value)
    {
        if (empty($value))
            $this->attributes['slug'] =  Str::slug($this->title);
        else
            $this->attributes['slug'] =  $value;
    }

    public function setNameAttribute($value)
    {
        if (empty($value))
            $this->attributes['name'] =  $this->title;
        else
            $this->attributes['name'] =  $value;
    }
}
