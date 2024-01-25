<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts() {

        $products = Product::paginate(10);

        return view('customer.main', compact('products'));
    }

    public function productDetail(Product $product) {

        return view('customer.detail', compact('product'));
    }
}
