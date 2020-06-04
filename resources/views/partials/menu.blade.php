<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">La Maison | La Boutique</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Accueil</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('product.sales')}}">Soldes</a>
            </li>
            @if(isset($category))
                @forelse($category as $id => $title)
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{url('category', $id)}}">{{ ucfirst($title) }}</a>
                    </li>
                @empty
                    <a class="dropdown-item" href="#">Aucunes catégories</a>
                @endforelse
            @endif
        </ul>

    </div>
</nav>
