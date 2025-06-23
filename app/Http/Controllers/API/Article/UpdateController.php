<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id, Request $request, ArticleRepositoryInterface $repo)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        $article = $repo->update($id, $request->only(['title', 'content']));

        return response()->json($article, Response::HTTP_OK);
    }
}
