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


    public function create(Product $products)
    {
        $categories = Category::pluck('title', 'id');

        return view('back.product.create', [
            'categories' => $categories, 'products'=>$products
        ]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'integer',
            'size' => 'integer',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'reference'=> 'required',
            'code' => 'in:solde,new',
            'status' => 'in:published,unpublished',
            'url_image' => 'active_url'

        ]);

        $product = Product::create($request->all());

        return redirect()->route('product.index');

    }
}
