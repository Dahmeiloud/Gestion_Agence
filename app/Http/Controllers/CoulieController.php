<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AgenceController;

use Auth;
use App\Models\Coulie;
use App\Models\Agence;
use Illuminate\Http\Request;

class CoulieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coulies = Coulie::with('agence')->get();
        return view('coulies.index')->with('coulies', $coulies);
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {
        $agences = Agence::all(); // Remplacez "Agence" par le nom de votre modèle d'agence
        return view('coulies.create')->with('agences', $agences);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données soumises dans le formulaire
        $validatedData = $request->validate([
            'code' => 'required|unique:coulies|max:255',
            'agence_id' => 'required|exists:agences,id',
        ]);

        // Créer un nouvel objet Coulie avec les données soumises
        $coulie = new Coulie;
        $coulie->code = $validatedData['code'];
        $coulie->agence_id = $validatedData['agence_id'];

        // Enregistrer l'objet Coulie dans la base de données
        $coulie->save();

        // Rediriger l'utilisateur vers la liste des niveaux de coulie avec un message de confirmation
        return redirect()->route('coulies.index')->with('success', 'Le niveau de coulie a été créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
        public function show(Coulie $coulie)
        {
            return view('coulies.show')->with('coulie', $coulie);
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coulie $coulie)
    {
        $agences = Agence::all();
        return view('coulies.edit', compact('coulie', 'agences'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, Coulie $coulie)
            {
                // Valider les données soumises dans le formulaire
                $validatedData = $request->validate([
                    'code' => 'required|unique:coulies|max:255',
                    'agence_id' => 'required|exists:agences,id',
                ]);

                // Mettre à jour les propriétés de l'objet Coulie avec les données soumises
                $coulie->code = $validatedData['code'];
                $coulie->agence_id = $validatedData['agence_id'];

                // Enregistrer les modifications dans la base de données
                $coulie->save();

                // Rediriger l'utilisateur vers la liste des niveaux de coulie avec un message de confirmation
                return redirect()->route('coulies.index')->with('success', 'Le niveau de coulie a été mis à jour avec succès.');
            }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Coulie $coulie)
            {
                // Supprimer l'objet Coulie de la base de données
                $coulie->delete();

                // Rediriger l'utilisateur vers la liste des niveaux de coulie avec un message de confirmation
                return redirect()->route('coulies.index')->with('success', 'Le niveau de coulie a été supprimé avec succès.');
            }

}
