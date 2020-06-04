@extends('layouts.master')

@section('content')

    <p class="p-2 d-inline-block bg-dark text-light float-right">
        {{$products->total()}}
        @if($products->total() > 0)
             produits
        @else
             produit
        @endif
    </p>

    <h1>Tous nos produits</h1>

    {{ $products->links() }}

    <div class="row col-md-12 mb-2">

        @foreach($products as $product)
            <div class="col-md-4  mb-1 home-thumbnail">
                <a class="text-dark text-decoration-none text-center" href="{{ route('show_product', $product->id) }}">

                    <img class="img-thumbnail" src="{{($product->url_image)}}" onError="this.onerror=null;this.src='https://img.freepik.com/photos-gratuite/main-tenant-sacs-provisions-fond-uni_23-2148286215.jpg?size=626&ext=jpg';" alt="{{
                    $product->title }}" />


                    <p class="mb-1 font-weight-bold">{{ $product->title }}</p>

                    <p class="mb-0">Prix : {{ $product->price }}€</p>
                </a>
            </div>

        @endforeach

    </div>

    {{ $products->links() }}
@endsection
