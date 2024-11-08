<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if (!empty($search)) {

            $foods = Food::where('name', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->latest()->paginate(10);
        } else {
            $foods = Food::latest()->paginate(10);
        }
        return view('backend.pages.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:190',
            'description' => 'required|string|max:190',
            'price' => 'required|numeric|min:0',
            'is_available' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $food = Food::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'is_available' => $request->is_available,
        ]);
    
        if ($request->hasFile('image')) {
            $food->addMediaFromRequest('image')->toMediaCollection('image');
        }
    
        toast()->success('خوارەکە بەسەرکەوتویی زیاد کرا');
        return redirect()->route('foods.index');
    }    

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        return view('backend.pages.foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name' => 'required|string|max:190',
            'description' => 'required|string|max:190',
            'price' => 'required|numeric|min:0',
            'is_available' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $food->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'is_available' => $request->is_available,
        ]);
    
        if ($request->hasFile('image')) {
            $food->clearMediaCollection('image');
            $food->addMediaFromRequest('image')->toMediaCollection('image');
        }
    
        toast()->success('خوارەکە بەسەرکەوتویی نوێ کرایەوە');
        return redirect()->route('foods.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $food->delete();
        toast()->success('خوارەکە بەسەرکەوتویی سڕایەوە');
        return redirect()->route('foods.index');
    }
}
