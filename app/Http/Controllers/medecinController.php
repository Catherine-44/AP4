<?php

namespace App\Http\Controllers;

use App\Models\medecin;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class medecinController extends Controller
{
    public function recherchenom(Request $request) {
        $medecins = medecin::where([
            ['nom', '!=', Null],
            [function ($query) use ($request) {
                if (($term =$request->term)) {
                    $query->orWhere('nom', 'LIKE', '%' .$term. '%')->get();
                }
            }]
        ])
            ->orderBy("nom", "asc")
            ->paginate(20);
        // $medecins = medecin::orderBy("nom","asc")->paginate(20);
        return view('medecinnom', compact("medecins"))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function recherchedep(Request $request) {
        $medecins = medecin::where([
            ['departement', '!=', Null],
            [function ($query) use ($request) {
                if (($term1 =$request->term1)) {
                    $query->orWhere('departement', 'LIKE', '%' .$term1. '%')->get();
                }
            }]
        ])
            ->orderBy("departement", "asc")
            ->paginate(20);
        // $medecins = medecin::orderBy("departement","asc")->paginate(20);
        return view('medecindep', compact("medecins"))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create() {
        $medecins = medecin::all();
        return view('createMedecin', compact("medecins"));
    }

    public function edit(Medecin $medecin) {
        return view('editMedecin', compact("medecin"));
    }

    public function ajouter(Request $request) {

        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "adresse"=>"required",
            "tel"=>"required",
            "specialiteComplementaire",
            "departement"=>"required"

        ]);

        medecin::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "adresse"=>$request->adresse,
            "tel"=>$request->tel,
            "departement"=>$request->departement,
            "specialiteComplementaire"=>$request->specialiteComplementaire

        ]);

        return back()->with("success", "Medecin ajouté avec succès !");
    }

    public function update(Request $request, Medecin $medecin) {

        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "adresse"=>"required",
            "tel"=>"required",
            "specialiteComplementaire",
            "departement"=>"required",

        ]);

        $medecin->update($request->all());

        return back()->with("success", "Medecin mis à jour avec succès !");
    }

    public function delete(Medecin $medecin){
        $nom_complet = $medecin->nom." ".$medecin->prenom;
        $medecin->delete();

        return back()->with("successDelete", "Le medecin '$nom_complet' supprimé avec succès!");
    }
}
