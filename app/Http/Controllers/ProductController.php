<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);

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
            'reference'=> 'string',
            'code' => 'in:solde,new',
            'status' => 'in:published,unpublished',
            'url_image' => 'nullable|string'
        ]);

        $product = Product::create($request->all());

        return redirect()->route('product.index');

    }

    public function edit(int $id)
    {
        $product = Product::find($id);

        $categories = Category::pluck('title', 'id');

        return view('back.product.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, int $id)
    {
        $product = Product::find($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'integer',
            'size' => 'integer',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'reference'=> 'string',
            'code' => 'in:solde,new',
            'status' => 'in:published,unpublished',
            'url_image' => 'nullable|string|'
        ]);

        $product->update($request->all());

        return redirect()->route('product.index');
    }

    public function destroy(int $id){

        $product = Product::where('id', $id)->first();

        $product->delete();

        return redirect()->route('product.index');
    }
}
