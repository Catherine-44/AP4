<?php

namespace App\Http\Controllers;

use App\Models\medecin;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class departementController extends Controller
{
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
}
