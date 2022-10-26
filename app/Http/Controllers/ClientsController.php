<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    // Show all clients
    public function index()
    {
        $clients = Clients::all();
        return view('clients.index', [
            'heading' => 'Clients',
            'clients' => $clients
        ]);
    }

    // Create Client Form
    public function create()
    {
        return view('clients.create', [
            'heading' => 'Add a New Client'
        ]);
    }

    // Edit client
    public function edit(Clients $client)
    {
        // If the users prs_code is not the same as the clients prs_code trigger 403 error
        if (auth()->user()->prs_code != $client->prs_code) {
            abort(403)->with('message', 'You are not authorised to edit this client');
        }
        return view('clients.edit', [
            'heading' => 'Edit Client',
            'client' => $client]);
    }

    // Store Client Data
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'website' => 'required',
            'phone' => 'required',
        ]);

        $data['prs_code'] = auth()->user()->prs_code;
        $data['client_code'] = 'CLNT' . uniqid();
        //\dd($data);
        Clients::create($data);
        return redirect('/clients')->with('message', 'Client Created Successfully');
    }

    // Update client
    public function update(Request $request, Clients $client)
    {
        // If the users prs_code is not the same as the clients prs_code trigger 403 error
        if (auth()->user()->prs_code != $client->prs_code) {
            abort(403)->with('message', 'You are not authorised to edit this client');
        }
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'website' => 'required',
            'phone' => 'required',
        ]);

        $client->update($data);
        return redirect('/clients/'.$client->id.'/edit')->with('message', 'Client Updated Successfully');
    }

    // Update Clients Logo
    public function updateLogo(Request $client){
        $data = $client->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    // Delete client
    public function destroy(Clients $client)
    {
        // If the users prs_code is not the same as the clients prs_code trigger 403 error
        if (auth()->user()->prs_code != $client->prs_code) {
            abort(403)->with('message', 'You are not authorised to delete this client');
        }
        $client->delete();
        return redirect('/clients')->with('message', 'Client Deleted Successfully');
    }
}
