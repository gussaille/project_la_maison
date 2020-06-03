@extends('layouts.master')

@section('content')

    {{ $products->links() }}

    <h1>Tous les produits de la catégorie {{ $name ?? 'Pas de nom' }}</h1>
    <div class="row">

        @foreach($products as $product)
            <div class="col-md-4  mb-1 home-thumbnail">
                <a class="text-dark text-decoration-none text-center" href="{{ route('show_product', $product->id) }}">

                    <img class="img-thumbnail" src="{{ $product->url_image }}" alt="{{
                    $product->title }}" />

                    <p class="mb-1 font-weight-bold">{{ $product->title }}</p>

                    <p class="mb-0">Prix : {{ $product->price }}€</p>
                </a>
            </div>

        @endforeach
    </div>

    {{ $products->links() }}
@endsection
