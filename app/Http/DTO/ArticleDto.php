<?php

namespace App\Http\DTO;

use Brick\Math\BigInteger;
use Spatie\LaravelData\Data;

class ArticleDto extends Data
{
    public string $title;
    public string $content;
    public int $user_id;
}
