<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Http\DTO\ArticleDto;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ArticleRepositoryInterface $repo)
    {
        
        return response()->json(
            ArticleDto::collect($repo->all()),
            Response::HTTP_OK
        );
    }
}
