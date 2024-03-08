<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $clients = Client::all();
        return view('clients.index') ->with('clients', $clients);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client= new Client();
        $client->nom=$request->nom;
        $client->numero_telephone=$request->numero_telephone;
        $client->adresse=$request->adresse;
        $client->save();

         return redirect('clients')->with('flash_message','Clients Addedd');

    }
        /**
         * Display the specified resource.
         */
        public function show($id)
        {
            $client = Client::findOrFail($id);
            return view('clients.show', compact('client'));
        }

        /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit')->with('client', $client);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'numero_telephone' => 'required',
            'adresse' => 'required',
        ]);

        $client->update($validatedData);

        return redirect()->route('clients.index')->with('flash_message', 'Client updated successfully');
    }
            /**
             * Remove the specified resource from storage.
             */
            public function destroy(Client $client)
            {
                $client->delete();

                return redirect()->route('clients.index')->with('flash_message', 'Client deleted successfully');
            }

}
