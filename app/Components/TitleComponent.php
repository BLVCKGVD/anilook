<?php

namespace App\Components;

use App\Enum\CacheEnum;
use App\Models\Season\Season;
use App\Models\Title\Title as TitleModel;
use Illuminate\Support\Facades\Cache;

class TitleComponent extends BaseComponent
{
    public function getTitle($url)
    {
        return Cache::remember(
            CacheEnum::SINGLE_TITLE->key($url),
            CacheEnum::SINGLE_TITLE->ttl(),
            function () use ($url) {
                return TitleModel::query()->with('seasons.episodes')->where('url', $url)->first();
            });
    }

    private function getSeasons()
    {
        return Cache::remember(
            CacheEnum::SEASONS->key('main-page-seasons'),
            CacheEnum::SEASONS->ttl(),
            function () {
                return Season::query()
                    ->where('show_in_main', true)
                    ->orderBy('position')
                    ->get()->map(function ($season) {
                        return $this->getSeason($season->url);
                    });
            }
        );
    }

    private function getSeason($url)
    {
        return Cache::remember(
            CacheEnum::SINGLE_SEASON->key($url),
            CacheEnum::SINGLE_SEASON->ttl(),
            function () use ($url) {
                return Season::query()->with(['titles', 'episodes'])->where('url', $url)->first();
            });
    }
}
