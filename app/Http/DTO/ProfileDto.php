<?php

namespace App\Http\DTO;

use Spatie\LaravelData\Data;

class ProfileDto extends Data
{
    public string $name;
    public string $email;
    public string $created_at;
}
