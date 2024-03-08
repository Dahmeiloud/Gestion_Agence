<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');
        $agences = Agence::query();

        if ($query) {
            $agences->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('nom', 'LIKE', '%' . $query . '%')
                    ->orWhere('email', 'LIKE', '%' . $query . '%')
                    ->orWhere('localisation', 'LIKE', '%' . $query . '%');
            });
        }

        $agences = $agences->paginate(10);

        return view('agences.index', compact('agences', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $agence= new Agence();
        $agence->nom=$request->nom;
        $agence->email=$request->email;
        $agence->password=$request->password;
        $agence->localisation=$request->localisation;

        // Gestion du téléchargement de fichier
        // if ($request->hasFile('photo')) {
        //     $file = $request->file('photo');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $path = $file->storeAs('public/photos', $filename);
        //     $agence->photo = $filename;
        // }



        $agence->save();

        return redirect()->route('agences.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agence $agence)
    {
        return view('agences.show')->with('agence', $agence);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agence = Agence::findOrFail($id);
        return view('agences.edit', compact('agence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'localisation' => 'required'
        ]);

        $agence = Agence::findOrFail($id);
        $agence->nom = $request->nom;
        $agence->email = $request->email;
        $agence->localisation = $request->localisation;


        // Gestion du téléchargement de fichier
                if ($request->hasFile('photo')) {
                // Supprimer l'ancien fichier s'il existe
                if ($agence->photo) {
                Storage::delete('public/photos/' . $agence->photo);
            }
       // Télécharger le nouveau fichier
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/photos', $filename);
            $agence->photo = $filename;
        }

        $agence->save();

        return redirect()->route('agences.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agence $agence)
    {
        // Supprimer le fichier s'il existe
        if ($agence->photo) {
            Storage::delete('public/photos/' . $agence->photo);
        }

        $agence->delete();
        return redirect()->route('agences.index')
            ->with('success','Agence supprimée avec succès.');
    }

}
