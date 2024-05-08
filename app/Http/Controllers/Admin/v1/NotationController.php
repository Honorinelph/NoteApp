<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotationCreateRequest;
use App\Http\Requests\NotationUpdateRequest;
use App\Models\Notation;
use App\Models\NotationCriterion;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;

class NotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notations = Notation::all();

        return view('admin.notations.index', compact('notations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $universities = University::all();
        $criteres = NotationCriterion::all();
        $users = User::all();
        return view('admin.notations.create',compact('users','universities','criteres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotationCreateRequest $request)
    {

        $validatedData = $request->validated();
        Notation::create($validatedData);

        return redirect()->route('admin.notations.index')->with('success', 'Notation ajoutée avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function detail(Notation $notation)
    {

        return view('frontend.notes.detail',compact('notation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notation $notation)
    {
        $users = User::all();
        $universities = University::all();
        $criteres = NotationCriterion::all();
        return view('admin.notations.edit',compact('notation','users','universities','criteres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotationUpdateRequest $request, Notation $notation)
    {
        $request->validated();
        $notation->update($request->all());

        return to_route('admin.notations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notation $notation)
    {
        $notation->delete();
        return to_route('admin.notations.index');
    }


    public function history()
    {
        $user = auth()->user();

        if ($user) {
            $notations = $user->notations()->latest()->paginate(10);

            return view('admin.notations.history', compact('notations'));
        } else {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à cette page.');
        }
    }


}
