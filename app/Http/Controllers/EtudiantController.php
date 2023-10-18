<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('Etudiants.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = Ville::all();
        return view('Etudiants.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'datedenaissance' => 'required',
            'ville_id' => 'required'
        ]);

        $user = new User([
            'name' => $request->input('nom'),
            'email' => $request->input('email'),
            'password' => bcrypt('abc123'),
        ]);
        $user->save();

        //$newEtudiant = Etudiant::create($data);
        $etudiant = new Etudiant([
            'nom' => $request->input('nom'),
            'adresse' => $request->input('adresse'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'datedenaissance' => $request->input('datedenaissance'),
            'ville_id' => $request->input('ville_id'),
            'user_id' => $user->id,
        ]);
        $etudiant->save();

        return redirect(route('Etudiant.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        return view('Etudiants.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view('Etudiants.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $data = $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'datedenaissance' => 'required',
            'ville_id' => 'required'
        ]);

        if (auth()->user()->id === $etudiant->user_id) {
            $etudiant->update($data);
            return redirect(route('etudiant.index'))->withSuccess('Etudiant mis à jour avec succès');
        } else {
            return redirect(route('etudiant.index'))->withErrors('Impossible de mettre à jour les données');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        if (auth()->user()->id === $etudiant->user_id) {
            $etudiant->delete();
            return redirect(route('etudiant.index'))->withSuccess('Etudiant supprimé avec succès');
        } else {
            return redirect(route('etudiant.index'))->withErrors('Impossible de supprimer des données');
        }
    }
}
