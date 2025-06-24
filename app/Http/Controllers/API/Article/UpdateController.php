<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateArticleRequest;
use App\Repositories\ArticleRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id, UpdateArticleRequest $request, ArticleRepositoryInterface $repo)
    {

        $article = $repo->update($id, $request->only(['title', 'content']));

        return response()->json($article, Response::HTTP_OK);
    }
}
