@extends("layouts.master")

@section("contenu")
<br>
<div>
    <div class="mx-auto pull-right">
        <div>
            <form action="{{ route('medecindep') }}" method="GET" role="search">

                <div class="input-group">

                    <input type="number" class="form-control mr-2" name="term1" placeholder="Rechercher medecins par son département" id="term1">
                    <a href="{{ route('medecindep') }}" class=" mt-1">
                    </a>
                    <span class="input-group-btn mr-5 mt-1" >
                        <button class="btn btn-primary" type="submit" title="Search medecins">
                            <span class="fas fa-search">Rechercher</span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Liste des médecins par département</h3>

    <div class="mt-4">
        <div class="d-flex justify-content-between mg-4">
            {{ $medecins->links() }}
            <div><a href="{{route('medecin.create')}}" class="btn btn-primary">Ajouter un médecin</a></div>
        </div>

        @if (session()->has("successDelete"))
        <div class="alert alert-success">
            <h3>{{session()->get('successDelete') }}</h3>
        </div>
        @endif

        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Département</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($medecins as $medecin)

            <tr>
                <th scope="row">{{$medecin->id}}</th>
                <td>{{$medecin->nom}}</td>
                <td>{{$medecin->prenom}}</td>
                <td>{{$medecin->adresse}}</td>
                <td>{{$medecin->departement}}</td>
                <td>
                    <a href="{{route('medecin.edit', ['medecin'=>$medecin->id])}}" class="btn btn-info">Editer</a>

                    <a href="#" class="btn btn-info btn-danger" onclick="if(confirm('Voulez vous vraiment supprimer ce medecin ?')){document.getElementById('form-{{$medecin->id}}').submit() }">Supprimer</a>

                    <form id="form-{{$medecin->id}}" action="{{route('medecin.supprimer', ['medecin'=>$medecin->id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
    </div>
@endsection
