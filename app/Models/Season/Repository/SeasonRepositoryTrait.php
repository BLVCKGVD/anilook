<?php

namespace App\Models\Season\Repository;

use App\Models\Episode\Episode;
use App\Models\Title\Title;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait SeasonRepositoryTrait
{
    public function titles(): BelongsTo
    {
        return $this->belongsTo(Title::class, 'title_id', 'id');
    }

    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class, 'season_id', 'id');
    }
}
