@extends("layouts.master")
<br>
<br>
<br>
@section("contenu")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Modification d'un médecin</h3>

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
        <form style="width: 65%" method="GET" action="{{route('medecin.changer', ['medecin'=>$medecin->id])}}">

            @csrf

            <input type="hidden" name="_method" value="put">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom du médecin</label>
                <input type="text" class="form-control" name="nom" value="{{$medecin->nom}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prénom du médecin</label>
                <input type="text" class="form-control" name="prenom" value="{{$medecin->prenom}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Adresse du médecin</label>
                <input type="text" class="form-control" name="adresse" value="{{$medecin->adresse}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Numéro de département</label>
                <input type="number" class="form-control" name="departement" value="{{$medecin->departement}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Numéro de téléphone</label>
                <input type="tel" class="form-control" name="tel" value="{{$medecin->tel}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Spécialité</label>
                <input type="text" class="form-control" name="specialiteComplementaire" value="{{$medecin->specialiteComplementaire}}">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="{{ route('home') }}" class="btn btn-danger">Annuler</a>
        </form>
    </div>
</div>

@endsection
