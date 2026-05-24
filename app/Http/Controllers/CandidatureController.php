<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidatureRequest;
use App\Http\Requests\UpdateCandidatureRequest;
use App\Models\Candidature;
use App\Models\User;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    
 public function dashboard()
{
    // 1. Nombre total de candidatures
    $TotalCandidatures = Candidature::count();

    // 2. Compte par statut en utilisant directement Eloquent
    $Tot_candidatures_en_attente   = Candidature::where('statut', 'a examiner')->count();
    $Tot_candidatures_acceptees   = Candidature::where('statut', 'Acceptee')->count();
    $Tot_candidatures_rejetees    = Candidature::where('statut', 'Refusee')->count();
    $Tot_candidatures_abondonnes = Candidature::where('statut', 'Abandonnee')->count();

    // Envoi des compteurs à ta vue dashboard
    return view('dashboard', compact(
        'TotalCandidatures',
        'Tot_candidatures_en_attente',
        'Tot_candidatures_acceptees',
        'Tot_candidatures_rejetees',
        'Tot_candidatures_abondonnes'
    ));
}

    public function index()
    {
        $candidatures = Candidature::where('user_id', auth()->id())->latest()->get();
        return view('candidature.index', compact('candidatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('candidature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidatureRequest $request)
    { 
        auth()->user()->candidatures()->create($request->validated());
        return redirect()->route('candidature.index')->with('success', 'Candidature created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidature $candidature)
    {
         
        return view('candidature.show',compact('candidature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidature $candidature)
    {
        return view('candidature.edit', compact('candidature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidatureRequest $request, Candidature $candidature)
    {
        $candidature->update($request->validated());
        return redirect()->route('candidature.index')->with('success', 'Candidature updated successfully.');
    }

    /**
     * Re
     * move the specified resource from storage.
     */
    public function destroy(Candidature $candidature)
    {
        $candidature->delete();
        return redirect()->route('candidature.index')->with('success', 'Candidature deleted successfully.');
    }
}
