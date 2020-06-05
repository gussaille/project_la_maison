<nav class="navbar navbar-expand-lg d-flex flex-column align-items-start navbar-light bg-light">
    <div class="d-block mb-1">
        <a class="nav-link mb-0 navbar-brand h3 font-weight-bold" href="{{route('home')}}">La Maison | La Boutique</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Accueil</a>
            </li>

            @if(Route::current()->getPrefix() != '/admin')

                <li class="nav-item active">
                    <a class="nav-link" href="{{route('product.sales')}}">Soldes</a>
                </li>

                @if(isset($category))
                    @forelse($category as $id => $title)
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{url('category', $id)}}">{{ ucfirst($title) }}</a>
                        </li>
                    @empty
                        <a class="nav-link text-dark" nohref>Aucune catégorie</a>
                    @endforelse
                @endif

            @else
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('product.index')}}">Dashboard</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('product.create') }}">Ajouter un
                    produit</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
