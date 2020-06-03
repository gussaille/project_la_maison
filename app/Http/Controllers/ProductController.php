<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $paginate = 10;

    public function index()
    {
        $products = Product::paginate($this->paginate);

        $category = Category::pluck('title', 'id')->all();

        return view('back.product.index', ['products' => $products, 'category'=> $category]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.product.create');
    }
}
