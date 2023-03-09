<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductPageController extends Controller
{

    public function index($slug) {
        $produc_info = Product::where('slug', $slug)->first();

        if ($produc_info == null) abort('404');

        $upsale = Product::where('category', $produc_info->category)->take(4)->get();

        return view('productpage', ['productinfo' => $produc_info, 'upsale' => $upsale]);

    }
}
