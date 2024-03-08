<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TrajetController;
use App\Models\Billet;
use App\Models\Agence;
use App\Models\Client;
use App\Models\Trajet;
use Picqer;
use Illuminate\Http\Request;

class BilletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $billets = Billet::where('code', 'LIKE', '%'.$search.'%')
                        ->orWhere('prix', 'LIKE', '%'.$search.'%')
                        ->orWhereHas('agence', function ($query) use ($search) {
                            $query->where('nom', 'LIKE', '%'.$search.'%');
                        })
                        ->orWhereHas('client', function ($query) use ($search) {
                            $query->where('nom', 'LIKE', '%'.$search.'%');
                        })
                        ->orWhereHas('trajet', function ($query) use ($search) {
                            $query->where('lieu_departe', 'LIKE', '%'.$search.'%')
                                  ->orWhere('lieu_arivee', 'LIKE', '%'.$search.'%');
                        })
                        ->get();

        return view('billets.index', ['billets' => $billets]);
    }

    /**
     * Show the form for creating a new resource.
     */
            public function create()
        {
            $agences = Agence::all();
            $clients = Client::all();
            $trajets = Trajet::all();

            return view('billets.create', ['agences' => $agences, 'clients' => $clients, 'trajets' => $trajets]);
        }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {


        // $billet_code = rand(106890122, 100000000);

        // $redColor = '255, 0, 0';
        // $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        // $barcodes = $generator->getBarcode( $billet_code,
        // $generator:: TYPE_STANDARD_2_5, 2, 60);

        $billet = new Billet();
        $billet->code = $request->input('code');
        $billet->prix = $request->input('prix');
        $billet->agence_id = $request->input('agence_id');
        $billet->client_id = $request->input('client_id');
        $billet->trajet_id = $request->input('trajet_id');
        // $billet->billet_code = $request->input('billet_code');
        // $billet->barcode = $barcodes;
        $billet->save();

        return redirect()->route('billets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Billet $billet)
    {
        return view('billets.show', ['billet' => $billet]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Billet $billet)
   {
        $agences = Agence::all();
        $clients = Client::all();
        $trajets = Trajet::all();

        return view('billets.edit', ['billet' => $billet, 'agences' => $agences, 'clients' => $clients, 'trajets' => $trajets]);
   }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Billet $billet)
        {
            $billet->code = $request->input('code');
            $billet->prix = $request->input('prix');
            $billet->agence_id = $request->input('agence_id');
            $billet->client_id = $request->input('client_id');
            $billet->trajet_id = $request->input('trajet_id');
            $billet->save();

            return redirect()->route('billets.show', ['billet' => $billet]);
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Billet $billet)
        {
            $billet->delete();

            return redirect()->route('billets.index');
        }

}
