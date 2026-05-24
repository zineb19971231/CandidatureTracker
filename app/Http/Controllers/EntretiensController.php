<?php

namespace App\Http\Controllers;

use App\Models\Entretien;
use Illuminate\Http\Request;

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
        return view ('entretiens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
