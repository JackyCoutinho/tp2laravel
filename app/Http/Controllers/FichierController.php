<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fichier;
use App\Models\User;

class FichierController extends Controller
{
    public function index()
    {
        $users = User::all();
        $files = Fichier::paginate(5);
        return view('Fichiers.index', ['files' => $files, 'users' => $users]);
    }

    public function create()
    {
        return view('Fichiers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,zip,doc|max:2048',
        ]);

        if ($request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $saveFile = $file->storeAs('uploads', $fileName, 'public');

            Fichier::create([
                'nom' => $fileName,
                'chemain' => $saveFile,
                'user_id' => auth()->user()->id
            ]);

            return redirect(route('file.index'))->withSuccess('File uploaded successfully');
        }

        //return redirect()->back()->with('error', 'Falha no upload do arquivo.');
        return redirect(route('file.index'))->withError('Error in file upload');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fichier $file)
    {
        return view('Fichiers.show', ['file' => $file]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fichier $file)
    {
        return view('fichiers.edit', ['file' => $file]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fichier $file)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,zip,doc|max:2048',
        ]);

        if ($request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $saveFile = $file->storeAs('uploads', $fileName, 'public');

            Fichier::create([
                'nom' => $fileName,
                'chemain' => $saveFile
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fichier $file)
    {

        if (auth()->user()->id === $file->user_id) {
            $file->delete();
            return redirect(route('file.index'))->withSuccess('Fichier effacée');
        } else {
            return redirect(route('file.index'))->withErrors('Impossible de supprimer le fichier');
        }
    }
}
