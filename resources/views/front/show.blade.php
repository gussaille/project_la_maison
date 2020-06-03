@extends('layouts.master')

@section('content')
    <div class="col-md-12">

        <div class="m-3 row d-flex justify-content-center">
            <div class="col-md-6">
                <img class="product-img img-fluid" src="{{ $product->url_image }}" alt="{{
                $product->title
                }}" />
            </div>
            <div class="col-md-3">
                <p class="font-weight-bold h4">{{ $product->title }}</p>
                <p>Ref : {{$product->reference}}</p>
                <p>Prix : {{$product->price}}€</p>

                <label for="size">Tailles</label>
                <select name="size" id="size">
                        <option value=" {{ $product->size }}"> {{ $product->size }}</option>
                </select>

            </div>
        </div>

        <h2>Description : </h2>
        <p>{{ $product->description}}</p>
    </div>

@endsection
