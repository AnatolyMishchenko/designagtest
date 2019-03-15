<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticlesResource;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     */
    public function index()
    {
        $articles = Article::all();

        return ArticlesResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticlesRequest $request
     * @return ArticlesResource
     */
    public function store(ArticlesRequest $request)
    {
        $data = $request->all();
        $created = Article::create($data);

        return new ArticlesResource($created);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return ArticlesResource
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return new ArticlesResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticlesRequest $request
     * @param  int $id
     * @return ArticlesResource
     */
    public function update(ArticlesRequest $request, $id)
    {
        $data = $request->all();
        $article = Article::findOrFail($id);
        $article->update($data);

        return new ArticlesResource($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response('', 204);
    }
}
