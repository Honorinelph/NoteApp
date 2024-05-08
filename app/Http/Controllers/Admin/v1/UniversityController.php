<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUniversityRequest;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universities = University::latest()->paginate(10);
        return view('admin.universities.index', compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.universities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUniversityRequest $request)
    {
        $request->validated();
        University::create($request->all());

        return to_route('admin.universities.index');

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
    public function edit(University $university)
    {
        return view('admin.universities.edit', compact('university'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateUniversityRequest $request, University $university)
    {
        $request->validated();
        $university->updated($request->all());
         return to_route('admin.universities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        $university->delete();
        return to_route('admin.universities.index');
    }
}
