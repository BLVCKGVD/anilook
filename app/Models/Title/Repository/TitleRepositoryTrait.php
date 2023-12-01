<?php

namespace App\Models\Title\Repository;

use App\Models\Season\Season;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait TitleRepositoryTrait
{
    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class, 'title_id', 'id');
    }
}
