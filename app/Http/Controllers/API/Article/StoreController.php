<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    public function __invoke(Request $request, ArticleRepositoryInterface $repo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article = $repo->create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id,
        ]);

        return response()->json($article, Response::HTTP_CREATED);
    }
}
