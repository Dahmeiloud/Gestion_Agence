<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Chauffeur;
use App\Models\Agence;
use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chauffeurs = Chauffeur::all();
        return view('chauffeurs.index')->with('chauffeurs', $chauffeurs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agences = Agence::all();
        return view('chauffeurs.create')->with('agences', $agences);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $chauffeur = new Chauffeur();
        $chauffeur->nom = $request->nom;
        $chauffeur->Numero_telephone = $request->Numero_telephone;
        $chauffeur->code = $request->code;
        $chauffeur->agence_id = $request->agence_id;
        $chauffeur->save();

        return redirect('chauffeurs')->with('flash_message', 'Chauffeur ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chauffeur $chauffeur)
    {
        return view('chauffeurs.show')->with('chauffeur', $chauffeur);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chauffeur $chauffeur)
    {
        $agences = Agence::all();
        return view('chauffeurs.edit', compact('chauffeur', 'agences'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chauffeur $chauffeur)
    {
        $chauffeur->nom = $request->input('nom');
        $chauffeur->Numero_telephone = $request->input('Numero_telephone');
        $chauffeur->code = $request->input('code');
        $chauffeur->agence_id = $request->input('agence_id');
        $chauffeur->save();

        return redirect()->route('chauffeurs.show', $chauffeur->id)
            ->with('flash_message', 'Chauffeur mis à jour avec succès');
    }

    /**
    * Remove the specified resource from storage.
     */
    public function destroy(Chauffeur $chauffeur)
    {
        $chauffeur->delete();

        return redirect()->route('chauffeurs.index')
            ->with('flash_message', 'Chauffeur supprimé avec succès');
    }
}
