<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Permet d’afficher tous les enregistrements de la table. 
     */
    public function index()
    {
        $clients = Client::all(); 
        return view('clients.index', compact('clients'));  
        // pointe vers resources/views/clients/index.blade.php 
    }

    /**
     * Permet d’ouvrir la vue de création d’un nouveau client 
     */
    public function create()
    {
        return view('clients.create'); 
        // pointe vers resources/views/clients/create.blade.php 
    }

    /**
     * Permet d’enregistrer un enregistrement dans la table et d’ouvrir la liste des clients 
     */
    public function store(Request $request)
    {
        $client = new Client([ 
            'npr' => $request->input('npr'), 
            'adresse' => $request->input('adresse'), 
            'email' => $request->input('email'), 
        ]); 
        $client->save(); 
        return redirect('/clients')->with('success', 'Client saved.');    
        // pointe vers resources/views/clients/index.blade.php 
    }

    /**
     * Permet d’afficher un seul client à travers la vue show
     */
    public function show(string $id)
    {    
        $client = Client::find($id); 
        return view('clients.show',compact('client'));
    }

    /**
     * Permet d’ouvrir la vue edit avec comme argument le client à modifier. 
     */
    public function edit(string $id)
    {
        $client = Client::find($id); 
        return view('clients.edit', compact('client'));   
        // pointe vers resources/views/clients/edit.blade.php 
    }

    /**
     * Permet de faire des mises à jour des données de la table et de retourner à la liste des clients. 
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id); 
        $client->update($request->all()); 
        return redirect('/clients')->with('success', 'Client updated.');  
        // pointe vers resources/views/clients/index.blade.php 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $client = Client::find($id); 
        $client->delete(); 
        return redirect('/clients')->with('success', 'Client removed.');   
        // pointe vers resources/views/clients/index.blade.php 
    }
}
