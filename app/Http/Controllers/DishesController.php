<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kitchen.dish', [
            'dishes' => Dish::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kitchen.dish_create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $formData = request()->validate([
            'name' => ['required'],
            'category_id' => ['required'],
            'image' => ['required'],
        ]);
        $formData['image'] = request('image')->store('dishes_image');
        Dish::create($formData);

        return redirect('dish')->with('message', 'Dish created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        return view('kitchen.dish_edit', [
            'dish' => $dish,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $formData = request()->validate([
            'name' => ['required'],
            'category_id' => ['required'],
        ]);
        $formData['image'] = request('image') ? request('image')->store('dishes_image') : $dish->image;
        $dish->update($formData);

        return redirect('dish')->with('message', 'Dish updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return redirect('dish')->with('message', 'Dish remove successfully');
    }
}
