<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class IndexController extends Controller
{
    public function index() {
        $all_cat = Category::orderBy('order', 'asc')->get();

        return view('index', ['categories' => $all_cat]);
    }
}
