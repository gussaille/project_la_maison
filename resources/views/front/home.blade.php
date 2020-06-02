@extends('layouts.master')

@section('title')
    Page des books
@endsection

@section('content')
    <div class="row">

    @foreach($products as $product)
        <div class="col-md-4 m-3">
            <img class="img-thumbnail" src="{{ $product->url_image }}" alt="{{
            $product->title }}" />

            <p>{{ $product->title }}</p>

            <p>{{ $product->price }}€</p>
        </div>
    @endforeach

{{--    {{ $products->links() }}--}}



    {{--        @forelse($products as $book)--}}
{{--            <li class="list-group-item">--}}
{{--                <h2><a href="{{ route('show_book', $book->id) }}">{{ $book->title }}</a></h2>--}}
{{--
{{--                @if( is_null($book->picture) == false)--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xs-6 col-md-3">--}}
{{--                            <a href="{{ route('show_book', $book->id) }}">--}}
{{--                                <img width="171" src="{{ asset('images/' . $book->picture->link ) }}" alt="{{ $book->picture->title }}" />--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--            </li>--}}
{{--        @empty--}}
{{--        @endforelse--}}
{{--    </ul>--}}

{{--    --}}{{-- pagination de Laravel --}}
{{--    {{ $products->links() }}--}}
@endsection
