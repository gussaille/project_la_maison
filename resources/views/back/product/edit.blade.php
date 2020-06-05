@extends('layouts.master')

@section('content')

    {{-- Product Edit Form --}}
    <div class="container">
        <h1>Modifier un produit</h1>

        {{--Display Error Message if fields are not well bfullfilled--}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <p>Veuillez remplir tous les champs requis.</p>
            </div>
        @endif

        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6">

                    <div class="form">
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" name="title" value="{{$product->title}}" class="form-control"
                                   id="title" />
                            @if($errors->has('title')) <span class="error text-danger">{{ $errors->first('title')
                            }}</span> @endif
                        </div>
                    </div>

                    <div class="form">
                        <div class="form-group d-flex flex-column">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="20"
                                      rows="6">{{$product->description}}</textarea>
                            @if($errors->has('description')) <span class="error text-danger">{{ $errors->first
                            ('description')}}</span> @endif
                        </div>
                    </div>

                    <div class="form">
                        <div class="form-group">
                            <label for="price">Prix</label>
                            <input type="text" name="price" value="{{ $product->price}}" class="form-control"
                                   id="price" />
                            @if($errors->has('price'))
                                <span class="error text-danger">{{ $errors->first('price')}}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form">
                        <div class="form-group">
                            <label for="category">Catégorie</label>
                            <select name="category_id" id="category">

                                @foreach($categories as $id => $name)
                                    <option  {{ $product->category_id == $id ? 'selected' : null }}
                                             value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form">
                        <div class="form-group">
                            <label for="size">Tailles</label>
                                <select name="size" id="size">

                                    @foreach([46,48,50,52] as $size)
                                        <option {{ $product->size == $size ? 'selected' : null }}
                                                 value="{{$size}}">{{$size}}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>

                        <div class="form">
                            <div class="form-group">
                                <label for="url">Image url</label>

                                <input type="url" name="url_image" id="url"
                                       placeholder="https://example.jpg"
                                       pattern="https://.*" value="{{$product->url_image}}">
                                @if($errors->has('url_image'))
                                    <span class="error text-danger">{{ $errors->first('url_image')}}</span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form">
                            <div class="form-group">
                                <h2>Status</h2>
                                <input {{ $product->status == 'published' ? 'checked' : null }} type="radio"
                                       name="status" id="published" value="published" />
                                <label for="published">Publier</label> <br>

                                <input {{ $product->status == 'unpublished' ? 'checked' : null }} type="radio"
                                       id="unpublished"
                                       name="status"
                                       value="unpublished" />
                                <label for="unpublished">Brouillon</label>
                            </div>
                        </div>

                        <div class="form">
                            <div class="form-group">
                                <label for="code">Code produit</label>
                                <select name="code" id="code">
                                    <option value="{{$product->code}}">{{$product->code}}</option>

                                    @if($product->code == "solde")
                                        <option value="new">New</option>
                                    @else
                                        <option value="solde">Solde</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                        <div class="form">
                            <div class="form-group">
                                <label for="reference">Référence du produit</label>
                                <input type="text" name="reference" value="{{ $product->reference }}" class="form-control"
                                       id="reference" minlength="16" />
                                @if($errors->has('reference')) <span class="error text-danger">{{ $errors->first
                                    ('reference')
                                    }}</span> @endif
                            </div>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>

            </form>
        </div>
    @endsection
