<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Repositories\ArticleRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    public function __invoke(StoreArticleRequest $request, ArticleRepositoryInterface $repo)
    {

        $article = $repo->create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id,
        ]);

        return response()->json($article, Response::HTTP_CREATED);
    }
}
