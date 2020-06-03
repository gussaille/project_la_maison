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

                @foreach($products as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>
                            @if($product->category_id === 1)
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
                            <button class="bg-secondary btn ">
                                <a class="text-light text-decoration-none" href="">Editer</a></button>
                        </td>
                        <td>
                            <button class="bg-danger btn ">
                                <a class="text-light text-decoration-none" href="">Supprimer</a>
                            </button>

{{--                            <form class="delete" method="POST" action="{{route('book.destroy', $product->id)}}">--}}
{{--                                @method('DELETE')--}}
{{--                                --}}
{{--                            token de sécurité qui permet de sécuriser les formulaires --}}
{{--                            si ce token n'est pas présent Laravel ne traitera pas le formulaire permet d'éviter les attaques csrf ou --}}
{{--                            attaque par formulaire --}}
{{--                            --}}
{{--                                @csrf--}}
{{--                                <input class="btn btn-danger" type="submit" value="delete">--}}
{{--                            </form>--}}
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@endsection
