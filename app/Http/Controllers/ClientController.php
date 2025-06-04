<?php

namespace App\Http\Controllers;

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
        return view('clien.list', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clien.creet');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:clients,email',
            'telephone' => 'nullable',
        ]);
        Client::create($request->all());
        return redirect()->route('clients.list')->with('success', 'Client ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clien.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:clients,email,'.$client->id,
            'telephone' => 'nullable',
        ]);
        $client->update($request->all());
        return redirect()->route('clients.list')->with('success', 'Client modifié avec succès');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.list')->with('success', 'Client supprimé avec succès');
    }



    
public function reservationparclien()
{
    $clients = Client::with(['reservations.evenement'])->get();
    return view('clien.reservationparclien', compact('clients'));
}

}
