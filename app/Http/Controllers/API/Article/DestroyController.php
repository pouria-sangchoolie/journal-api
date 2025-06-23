<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id, ArticleRepositoryInterface $repo)
    {
        $repo->delete($id);
        return response()->json(['message' => 'Deleted successfully'], Response::HTTP_NO_CONTENT);
    }
}
