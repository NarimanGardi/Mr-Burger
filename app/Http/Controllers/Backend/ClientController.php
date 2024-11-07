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
        $this->authorize('manage-client');
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
        $this->authorize('create-client');

        return view('backend.pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create-client');

        $request->validate([
            'name' => 'required|string|max:255|unique:clients,name',
            'type' => 'required|string|max:255',
        ]);

        Client::create([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        toast()->success('کڵایەنتەکە بەسەرکەوتویی زیاد کرا');
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Client $client)
    {
        $name = $client->name;
        $query = Transactions::where('name', $name);
        $search = $request->input('search');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('type', 'like', '%' . $search . '%') 
                    ->orWhere('amount', 'like', '%' . $search . '%')
                    ->orWhere('action', 'like', '%' . $search . '%');
            });
        }

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if (!empty($startDate) && !empty($endDate)) {
            $adjustedEndDate = date('Y-m-d', strtotime($endDate . ' +1 day'));
            $query->whereBetween('created_at', [$startDate, $adjustedEndDate]); 
        } elseif (!empty($startDate)) {
            $query->whereDate('created_at', '>=', $startDate);
        } elseif (!empty($endDate)) {
            $query->whereDate('created_at', '<=', $endDate);
        }

        $transactions = $query->latest()->paginate(10);

        return view('backend.pages.clients.view', compact('client', 'transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $this->authorize('edit-client');
        return view('backend.pages.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $this->authorize('edit-client');

        $request->validate([
            'name' => 'required|string|max:255|unique:clients,name,' . $client->id,
            'type' => 'required|string|max:255',
        ]);

        $client->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        toast()->success('کڵایەنتەکە بەسەرکەوتویی نوێکرایەوە');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $this->authorize('delete-client');

        $client->delete();

        toast()->success('کڵایەنتەکە بەسەرکەوتویی سڕایەوە');
        return back();
    }
}
