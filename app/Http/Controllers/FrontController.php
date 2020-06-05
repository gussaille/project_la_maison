<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(6);

        view()->composer('partials.menu', function ($view) {
            $category = Category::pluck('title', 'id')->all();
            $view->with('category', $category);
        });

        return view('front.home', ['products' => $products]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $product = Product::with('category')->findOrFail($id);

        view()->composer('partials.menu', function ($view) {
            $category = Category::pluck('title', 'id')->all();
            $view->with('category', $category);
        });

        return view('front.show', ['product' => $product]);
    }

    public function showCategory(int $id){

        $category = Category::findOrFail($id);

        $products = $category->products()->with('category')->orderBy('created_at', 'desc')->paginate(6);

        view()->composer('partials.menu', function ($view) {
            $category = Category::pluck('title', 'id')->all();
            $view->with('category', $category);
        });

        return view('front.category', [
            'products' => $products,
            'category' => $category
        ]);
    }

    public function showSales(Request $request){

        $products = Product::all()->sortByDesc('created_at')->whereIn('code', 'solde');
        $category = Category::pluck('title', 'id');

        return view('front.sales', ['products' => $products, 'category' => $category]);
    }
}
