<?php

namespace App\Components;

use App\Enum\CacheEnum;
use App\Models\Season\Season;
use Illuminate\Support\Facades\Cache;

class SeasonComponent extends BaseComponent
{
    public function getSeason($url)
    {
        return Cache::remember(
            CacheEnum::SINGLE_SEASON->key($url),
            CacheEnum::SINGLE_SEASON->ttl(),
            function () use ($url) {
                return Season::query()->with(['titles', 'episodes'])->where('url', $url)->first();
            });
    }
}
