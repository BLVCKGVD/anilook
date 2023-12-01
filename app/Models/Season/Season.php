<?php

namespace App\Models\Season;

use App\Models\Season\Repository\SeasonRepositoryTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model
{
    use SeasonRepositoryTrait;
    use SoftDeletes;

    protected $table = 'seasons';

    protected $casts = [
        'image_url' => 'array',
    ];

    protected $fillable = [
        'title',
    ];
}
