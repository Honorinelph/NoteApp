<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\NotationCriterion;
use Illuminate\Http\Request;

class CriterionNotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criteres = NotationCriterion::all();
        return view('admin.criteres.index',compact('criteres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.criteres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required'
        ]);

        NotationCriterion::create($request->all());

        return to_route('admin.criteres.index');
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
    public function edit(NotationCriterion $critere)
    {
        return view('admin.criteres.edit',compact('critere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NotationCriterion $critere)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $critere->update($request->all());

        return to_route('admin.criteres.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotationCriterion $critere)
    {
        $critere->delete();
        return to_route('admin.criteres.index');
    }
}
