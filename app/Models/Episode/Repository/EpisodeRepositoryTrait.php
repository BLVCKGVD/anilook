<?php

namespace App\Models\Episode\Repository;

use App\Models\Season\Season;
use App\Models\Title\Title;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

trait EpisodeRepositoryTrait
{
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class, 'season_id', 'id');
    }

    public function titles(): HasOneThrough
    {
        return $this->hasOneThrough(
            Title::class,
            Season::class,
            'title_id',
            'id',
        );
    }
}
