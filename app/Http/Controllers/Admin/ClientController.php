<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('dashboard.clients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_name'           => 'required|string',
            'en_name'           => 'required|string',
            'image'             => 'required|string'
        ]);
        $data['image'] = $request->image;

        Client::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('dashboard.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'ar_name'           => 'required|string',
            'en_name'           => 'required|string',
            'image'             => 'required|string'
        ]);
        $data['image'] = $request->image;

        $client->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        if ($client->image != null) {
            Storage::disk('local')->delete('public/clients/' . $client->image);
        }
        $client->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('clients.index');
    }

}
