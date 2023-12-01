<?php

namespace App\Models\Episode;

use App\Models\Episode\Repository\EpisodeRepositoryTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episode extends Model
{
    use EpisodeRepositoryTrait;
    use SoftDeletes;

    protected $table = 'episodes';

    protected $casts = [
        'image_url' => 'array',
    ];
}
