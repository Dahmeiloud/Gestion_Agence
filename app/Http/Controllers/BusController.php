<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Bus;
use App\Models\Chauffeur;
use App\Models\Agence;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $buses = Bus::all();
    //     return view('buses.index') ->with('buses', $buses);
    // }
    public function index()
{
    $buses = Bus::with('agence')->get();

    return view('buses.index', compact('buses'));



}
    /**
     * Show the form for creating a new resource.
     */
        public function create()
    {
        $agences = Agence::all();
        $chauffeurs = Chauffeur::all();
        return view('buses.create')->with(['agences' => $agences, 'chauffeurs' => $chauffeurs]);
    }
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            // Créer une nouvelle instance de Bus
            $bus = new Bus();

            // Affecter les valeurs des champs du formulaire aux attributs du bus
            $bus->matricule = $request->input('matricule');
            $bus->code = $request->input('code');
            $bus->chauffeur_id = $request->input('chauffeur_id');
            $bus->agence_id = $request->input('agence_id');

            // Enregistrer le bus dans la base de données
            $bus->save();

            // Rediriger l'utilisateur vers la liste des bus avec un message de confirmation
            return redirect('buses')->with('flash_message', 'Le bus a été ajouté avec succès.');
        }
        /**
         * Display the specified resource.
         */
        public function show(Bus $bus)
        {
            // Récupérer le chauffeur associé au bus
            $chauffeur = Chauffeur::find($bus->chauffeur_id);

            // Récupérer l'agence associée au bus
            $agence = Agence::find($bus->agence_id);

            // Afficher la vue des détails du bus avec les détails du chauffeur et de l'agence
            return view('buses.show')->with(['bus' => $bus, 'chauffeur' => $chauffeur, 'agence' => $agence]);
        }

         /**
         * Show the form for editing the specified resource.
         */
        public function edit(Bus $bus)
        {
            // Récupérer tous les chauffeurs et toutes les agences pour les afficher dans le formulaire
            $chauffeurs = Chauffeur::all();
            $agences = Agence::all();

            // Afficher la vue du formulaire d'édition du bus avec les détails du bus, des chauffeurs et des agences
            return view('buses.edit')->with(['bus' => $bus, 'chauffeurs' => $chauffeurs, 'agences' => $agences]);
        }
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Bus $bus)
        {
            // Affecter les valeurs des champs du formulaire aux attributs du bus
            $bus->matricule = $request->input('matricule');
            $bus->code = $request->input('code');
            $bus->chauffeur_id = $request->input('chauffeur_id');
            $bus->agence_id = $request->input('agence_id');

            // Enregistrer les modifications du bus dans la base de données
            $bus->save();

            // Rediriger l'utilisateur vers la liste des bus avec un message de confirmation
            return redirect('buses')->with('flash_message', 'Le bus a été mis à jour avec succès.');
        }

            /**
         * Remove the specified resource from storage.
         */
        public function destroy(Bus $bus)
        {
            // Supprimer le bus de la base de données
            $bus->delete();

            // Rediriger l'utilisateur vers la liste des bus avec un message de confirmation
            return redirect('buses')->with('flash_message', 'Le bus a été supprimé avec succès.');
        }

}
