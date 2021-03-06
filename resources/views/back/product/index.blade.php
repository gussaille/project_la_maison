@extends('layouts.master')

@section('content')
    <div class="container">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Status</th>
                    <th>Mettre à jour</th>
                    <th>Supprimer</th>
                </tr>
            </thead>

            <tbody>
                {{$products->links()}}

                {{--Loop Products--}}
                @foreach($products as $product)
                    <tr>
                        <td>
                            <a class="text-dark" href="{{route('show_product', $product->id)}}">{{$product->title}}
                            </a>
                        </td>

                        <td>
                            @if($product->category_id == 1)
                                Homme
                            @else
                                Femme
                            @endif
                        </td>

                        <td>{{$product->price}}€</td>

                        <td>
                            @if($product->status == 'published')
                                <p>Publié</p>
                            @else
                                <p>Non Publié</p>
                            @endif
                        </td>

                        <td>
                            <a class="btn bg-secondary text-light text-decoration-none" href="{{route('product.edit',
                             $product->id)}}">✎
                            </a>
                        </td>

                        <td>
                            {{--Delete Product Form--}}
                            <form class="delete" method="POST" action="{{route('product.destroy', $product->id)}}">
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-danger text-light" type="submit" value="&#128465;">
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{$products->links()}}

    </div>
@endsection
