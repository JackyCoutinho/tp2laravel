<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $villes = Ville::all();
        return view('Villes.index', ['villes' => $villes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Villes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required'

        ]);

        $newVille = new Ville();
        $newVille->nom = $request->input('nom');
        $newVille->user_id = auth()->user()->id;
        $newVille->save();

        return redirect(route('ville.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ville $ville)
    {
        return view('Villes.show', ['ville' => $ville]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ville $ville)
    {
        return view('Villes.edit', ['ville' => $ville]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ville $ville)
    {
        $data = $request->validate([
            'nom' => 'required'
        ]);

        if (auth()->user()->id === $ville->user_id) {
            $ville->update($data);
            return redirect(route('ville.index'))->withSuccess('Ville mis à jour avec succès');
        } else {
            return redirect(route('ville.index'))->withErrors('Impossible de mettre à jour des données');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ville $ville)
    {

        if (auth()->user()->id === $ville->user_id) {
            $ville->delete();
            return redirect(route('ville.index'))->withSuccess('Ville supprimé avec succès');
        } else {
            return redirect(route('ville.index'))->withErrors('Impossible de supprimer des données');
        }
    }
}
