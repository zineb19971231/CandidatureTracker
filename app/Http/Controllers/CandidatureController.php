<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidatureRequest;
use App\Http\Requests\UpdateCandidatureRequest;
use App\Models\Candidature;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    

public function dashboard() 
{
    $query = Candidature::where('user_id', auth()->id());

    $Tot_candidatures           = (clone $query)->count();
    $Tot_candidatures_en_attente = (clone $query)->where('statut', 'a examiner')->count();
    $Tot_candidatures_rejetees   = (clone $query)->where('statut', 'refusee')->count();
    $Tot_candidatures_abondonnes = (clone $query)->where('statut', 'abandonnee')->count();

    // Renvoie uniquement vers le fichier dashboard.blade.php
    return view('dashboard', compact(
        'Tot_candidatures', 
        'Tot_candidatures_en_attente', 
        'Tot_candidatures_rejetees', 
        'Tot_candidatures_abondonnes'
    ));
}

public function index() 
{
    $candidatures = Candidature::where('user_id', auth()->id())->latest()->get();
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
    // 1. On récupère les données validées du formulaire
    $data = $request->validated();

    // 2. On y injecte l'ID de l'utilisateur actuellement connecté
    $data['user_id'] = auth()->id();

    // 3. On crée la candidature avec l'ensemble des données
    Candidature::create($data);

    return redirect()->route('dashboard')->with('success', 'Candidature created successfully.');
}
    
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
