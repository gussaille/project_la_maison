<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class FrontController extends Controller
{
    private $paginate = 6;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate($this->paginate);

        view()->composer('partials.menu', function ($view) {
            $category = Category::pluck('title', 'id')->all();
            $view->with('category', $category);
        });

        return view('front.home', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showCategory(int $id){

        $category = Category::findOrFail($id);

        $products = $category->products()->with('category')->paginate($this->paginate);

        view()->composer('partials.menu', function ($view) {
            $category = Category::pluck('title', 'id')->all();
            $view->with('category', $category);
        });

        return view('front.category', [
            'products' => $products,
            'category' => $category
        ]);
    }

    public function showSales(int $id){

        $category = Category::findOrFail($id);

        $products = $category->products()->with('category')->paginate($this->paginate);

        return view('front.sales', [
            'products' => $products,
        ]);
    }
}
