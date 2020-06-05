@extends('layouts.master')

@section('content')
    <div class="container">
            <h1>Ajouter un produit</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <p>Vérifier le formulaire il comporte des erreurs !</p>
                </div>
            @endif

            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="row">

                    <div class="col-md-6">

                        <div class="form">
                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" />
                                @if($errors->has('title')) <span class="error bg-warning">{{ $errors->first('title')}}</span> @endif
                            </div>
                        </div>

                        <div class="form">
                            <div class="form-group d-flex flex-column">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="20" rows="6">{{ old
                                ('description') }}</textarea>
                                @if($errors->has('description')) <span class="error bg-warning">{{ $errors->first('description')}}</span> @endif
                            </div>
                        </div>

                        <div class="form">
                            <div class="form-group">
                                <label for="price">Prix</label>
                                <input type="text" name="price" value="{{ old('price') }}" class="form-control"
                                       id="price" />
                                @if($errors->has('price'))
                                    <span class="error bg-warning">{{ $errors->first('price')}}</span>
                                @endif
                            </div>
                        </div>


                        <div class="form">
                            <div class="form-group">
                                <label for="category">Catégorie</label>
                                <select name="category_id" id="category">
                                    @if(!$categories)
                                        @foreach($categories as $id => $name)
                                            <option {{ old('category_id') == $id ?'selected' : null }} value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    @else
                                        <option value="1">Homme</option>
                                        <option value="2">Femme</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                        <div class="form">
                            <div class="form-group">
                                <label for="size">Tailles</label>
                                <select name="size" id="size">

                                    <option value="46">46</option>
                                    <option value="48">48</option>
                                    <option value="50">50</option>
                                    <option value="52">52</option>

                                </select>

                            </div>
                        </div>

                        <div class="form">
                            <div class="form-group">
                                <label for="url">Image url</label>

                                <input type="url" name="url_image" id="url"
                                       placeholder="https://example.jpg"
                                       pattern="https://.*">
                                @if($errors->has('url_image'))
                                    <span class="error bg-warning">{{ $errors->first('url_image')}}</span>
                                @endif
                            </div>
                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="form">
                            <div class="form-group">
                                <h2>Status</h2>
                                <input {{ old('status') === 'published' ? 'checked' : null }} type="radio"
                                       name="status" id="published" value="published" />
                                <label for="published">Publier</label> <br>

                                <input {{ old('status') === 'unpublished' ? 'checked' : null }} type="radio"
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

                                    <option value="solde">Solde</option>
                                    <option value="new">New</option>

                                </select>
                            </div>
                        </div>

                        <div class="form">
                            <div class="form-group">
                                <label for="reference">Référence du produit</label>
                                <input type="text" name="reference" value="{{ old('reference') }}" class="form-control"
                                       id="reference" minlength="16" />
                                @if($errors->has('reference')) <span class="error bg-warning">{{ $errors->first
                                ('reference')
                                }}</span> @endif
                            </div>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ajouter</button>

            </form>
    </div>
@endsection
