
@extends("layouts.master")

@section("contenu")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Bienvenue dans notre application<h3>
</div>

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <strong>Bienvenue {{Auth::user()->name}} !</strong>
            @else
                <a class="btn btn-primary" href="{{ route('login') }}">Se connecter</a>

                @if (Route::has('register'))
                    <a class="btn btn-primary" href="{{ route('register') }}">S'inscrire</a>
                @endif
            @endauth
        </div>
    @endif
</div>

@endsection


