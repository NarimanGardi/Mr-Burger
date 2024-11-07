<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Transactions;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if (!empty($search)) {

            $clients = Client::where('name', 'like', '%' . $search . '%')->latest()->paginate(10);
        } else {
            $clients = Client::latest()->paginate(10);
        }
        return view('backend.pages.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:clients,name',
            'debt' => 'required|numeric|min:0',
        ]);

        Client::create([
            'name' => $request->name,
            'debt' => $request->debt,
        ]);

        toast()->success('مقاولەکە بەسەرکەوتویی زیاد کرا');
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Client $client)
    {
        return view('backend.pages.clients.view');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('backend.pages.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:clients,name,' . $client->id,
            'debt' => 'required|numeric|min:0',
        ]);

        $client->update([
            'name' => $request->name,
            'debt' => $request->debt,
        ]);

        toast()->success('مقاولەکە بەسەرکەوتویی نوێکرایەوە');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        toast()->success('مقاولەکە بەسەرکەوتویی سڕایەوە');
        return back();
    }
}
