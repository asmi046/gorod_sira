<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show_product_page() {
        return view('productpage');
    }

    public function show_cat() {
        return view('category');
    }

    public function index() {
        return view('products');
    }
}
