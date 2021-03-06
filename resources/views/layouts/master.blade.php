<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Maison | La boutique en ligne</title>
    <link rel="icon" type="image/png" href="/img/favicon.png" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            {{-- Navigation Menu --}}
            @include('partials.menu')

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            @yield('content')

        </div>
    </div>
</div>

@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@show

</body>
</html>
