<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id, ArticleRepositoryInterface $repo)
    {
        return response()->json($repo->find($id), Response::HTTP_OK);
    }
}
