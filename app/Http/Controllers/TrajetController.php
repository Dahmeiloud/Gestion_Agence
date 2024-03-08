<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Trajet;
use App\Models\Agence;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    /**
     * Affiche une liste de ressources.
     */
    public function index()
    {

        $trajets = Trajet::all();
        return view('trajets.index')->with('trajets', $trajets);
    }

    /**
     * Affiche le formulaire pour créer une nouvelle ressource.
     */
    public function create()
    {
        $agences = Agence::all();
        return view('trajets.create')->with('agences', $agences);
    }

    /**
     * Stocke une nouvelle ressource.
     */
    public function store(Request $request)
    {
        $trajet = new Trajet();
        $trajet->lieu_departe = $request->lieu_departe;
        $trajet->lieu_arivee = $request->lieu_arivee;
        $trajet->adresse = $request->adresse;
        $trajet->prix = $request->prix;
        $trajet->agence_id = $request->agence_id;
        $trajet->save();

        return redirect('trajets')->with('flash_message', 'Le trajet a été ajouté avec succès');
    }

    /**
     * Affiche une ressource spécifique.
     */
    public function show($id)
    {
        $trajet = Trajet::findOrFail($id);
        return view('trajets.show', ['trajet' => $trajet]);
    }

    /**
     * Affiche le formulaire pour modifier une ressource.
     */
    public function edit(Trajet $trajet)
    {
        $agences = Agence::all();
        return view('trajets.edit', compact('trajet', 'agences'));
    }

    /**
     * Modifie une ressource.
     */
    public function update(Request $request, Trajet $trajet)
    {
        $request->validate([
            'lieu_departe' => 'required',
            'lieu_arivee' => 'required',
            'prix' => 'required|numeric',
            'adresse' => 'required',
            'agence_id' => 'required|exists:agences,id',
        ]);

        $trajet->lieu_departe = $request->input('lieu_departe');
        $trajet->lieu_arrivee = $request->input('lieu_arivee');
        $trajet->prix = $request->input('prix');
        $trajet->adresse = $request->input('adresse');
        $trajet->agence_id = $request->input('agence_id');

        $trajet->update();

        return redirect()->route('trajets.index')->with('flash_message', 'Le trajet a été modifié avec succès');
    }

    /**
     * Supprime une ressource.
     */
    public function destroy(Trajet $trajet)
    {
        $trajet->delete();

        return redirect()->route('trajets.index')->with('flash_message', 'Letrajet a été supprimé avec succès');
    }
}
