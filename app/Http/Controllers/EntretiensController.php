<?php

namespace App\Http\Controllers;

use App\Models\Entretien;
use App\Models\Candidature;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEntretienRequest;

class EntretiensController extends Controller
{
   
    public function index()
{
    $entretiens = Entretien::with('candidature')->get();

    return view('entretiens.index',compact('entretiens')
    );
}
    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $candidatures = Candidature::where('user_id', auth()->id())->get();

    return view('entretiens.create', compact('candidatures'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEntretienRequest $request)
{
    $data = $request->validated();
    
    auth()->user()->entretiens()->create($data);

    // 3. Redirection vers l'index avec un message de succès
    return redirect()->route('entretiens.index')->with('success', 'Entretien créé avec succès.');
}

    /**
     * Display the specified resource.
     */
    public function show(Entretien $Entretien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entretien $Entretien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entretien $Entretien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entretien $Entretien)
    {
        //
    }
}
