@extends("layouts.master")
<br>
<br>
<br>
@section("contenu")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Ajout de médecin</h3>

    <div class="mt-4">

        @if (session()->has("success"))
        <div class="alert alert-success">
            <h3>{{session()->get('success') }}</h3>
        </div>
        @endif

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form style="width: 65%" method="post" action="{{route('medecin.ajouter')}}">

            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom du médecin</label>
                <input type="text" class="form-control" name="nom">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prénom du médecin</label>
                <input type="text" class="form-control" name="prenom">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Adresse du médecin</label>
                <input type="text" class="form-control" name="adresse">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Numéro de département</label>
                <input type="number" class="form-control" name="departement">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Numéro de téléphone</label>
                <input type="tel" class="form-control" name="tel">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Spécialité</label>
                <input type="text" class="form-control" name="specialiteComplementaire">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="{{ route('home') }}" class="btn btn-danger">Annuler</a>
        </form>
    </div>
</div>

@endsection
