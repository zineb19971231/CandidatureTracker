<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidatureRequest;
use App\Http\Requests\UpdateCandidatureRequest;
use App\Models\Candidature;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidatures = Candidature::all();
        return view('candidature.index', compact('candidatures'));
    }

  
    public function create()
    {
        return view('candidature.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidatureRequest $request)
    {
        Candidature::create($request->validated());
        return redirect()->route('candidatures.index')->with('success', 'Candidature created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidature $candidature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidature $candidature)
    {
        return view ('candidature.edit',);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidatureRequest $request, Candidature $candidature)
    {
        $data = $request->validated();
        $candidature->update($data);
        return redirect()->route('candidature.index')->with('success', 'Candidature updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidature $candidature)
    {
        //
    }
}
