<?php

namespace App\Http\Controllers;

use App\Models\ForumArticle;
use App\Models\Langue;
use Illuminate\Http\Request;

class ForumArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = ForumArticle::all();
        return view('Forum.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langues = Langue::all();
        return view('Forum.create', ['langues' => $langues]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valide les donnes
        $request->validate([
            'title' => 'required|max:100',
            'body' => 'required',
        ]);

        // Creer um nouveau topic
        $article = new ForumArticle();
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->user_id = auth()->user()->id;
        $article->langue_id = $request->input('langue_id');
        $article->save();

        return redirect(route('forum.index'))->withSuccess('Topic creer avec sucess.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumArticle  $forumArticle
     * @return \Illuminate\Http\Response
     */
    public function show(ForumArticle $forumArticle)
    {
        return view('Forum.show', ['forumArticle' => $forumArticle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumArticle  $forumArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumArticle $forumArticle)
    {
        $langues = Langue::all();
        return view('Forum.edit', ['forumArticle' => $forumArticle, 'langues' => $langues]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumArticle  $forumArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForumArticle $forumArticle)
    {
        $data = $request->validate([
            'title' => 'required|max:100',
            'body' => 'required',
            'langue_id' => 'required',
        ]);

        if (auth()->user()->id === $forumArticle->user_id) {
            $forumArticle->update($data);
            return redirect(route('forum.index'))->withSuccess('Donnée modifiée');
        } else {
            return redirect(route('forum.index'))->withErrors('Impossible de modifier les données');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumArticle  $forumArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumArticle $forumArticle)
    {
        if (auth()->user()->id === $forumArticle->user_id) {
            $forumArticle->delete();
            return redirect(route('forum.index'))->withSuccess('Donnée effacée');
        } else {
            return redirect(route('forum.index'))->withErrors('Impossible de supprimer des données');
        }
    }
}
