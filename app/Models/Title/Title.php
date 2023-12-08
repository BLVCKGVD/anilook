<?php

namespace App\Models\Title;

use App\Models\Title\Repository\TitleRepositoryTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Title extends Model
{
    use SoftDeletes;
    use TitleRepositoryTrait;

    protected $casts = [
        'image_url' => 'array',
    ];
}
