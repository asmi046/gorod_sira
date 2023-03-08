<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class ProductController extends Controller
{

    public function show_cat($slug) {
        $cat_info = Category::where('slug', $slug)->first();

        if($cat_info == null) abort('404');

        $all_cat = Category::all();

        return view('category', ['catinfo' => $cat_info, 'categories' => $all_cat]);
    }

    public function index() {
        $all_cat = Category::all();
        return view('products', ['categories' => $all_cat]);
    }
}
