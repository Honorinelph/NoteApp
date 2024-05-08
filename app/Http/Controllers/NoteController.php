<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotationCreateRequest;
use App\Http\Requests\NotationUpdateRequest;
use App\Models\Notation;
use App\Models\NotationCriterion;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notations = Notation::paginate(10);

        return view('frontend.notes.index', compact('notations'));
    }


    public function create()
    {

        $universities = University::all();
        $criteres = NotationCriterion::all();
        $users = User::all();
        return view('frontend.notes.create',compact('users','universities','criteres'));
    }

    public function store(NotationCreateRequest $request)
    {
        //dd($request->all());
        $validatedData = $request->validated();
        Notation::create($validatedData);

        return redirect()->route('notes.index')->with('success', 'Notation ajoutée avec succès.');
    }

    public function edit(Notation $note)
    {
        $users = User::all();
        $universities = University::all();
        $criteres = NotationCriterion::all();
        return view('frontend.notes.edit',compact('note','users','universities','criteres'));
    }

    public function update(NotationUpdateRequest $request, Notation $note)
    {
        $request->validated();
        $note->update($request->all());

        return to_route('notes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notation $note)
    {
        $note->delete();
        return to_route('notes.index');
    }

    public function show(Notation $notation)
    {
        dd($notation);
        return view('frontend.note.detail');
    }
}
