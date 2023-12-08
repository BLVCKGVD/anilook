<?php

namespace App\Components;

use App\Enum\CacheEnum;
use App\Models\Season\Season;
use App\Models\Title\Title;
use Illuminate\Support\Facades\Cache;

class Home extends BaseComponent
{
    public function getHomePage(): array
    {
        $result = [];
        $result['titles'] = $this->getTitles();
        $result['seasons'] = $this->getSeasons();

        return $result;
    }

    private function getTitles()
    {
        return Cache::remember(
            CacheEnum::TITLES->key('main-page-titles'),
            CacheEnum::TITLES->ttl(),
            function () {
                return Title::query()
                    ->where('show_in_main', true)
                    ->orderBy('position')
                    ->get()->map(function ($title) {
                        return $this->getTitle($title->url);
                    });
            }
        );
    }

    private function getTitle($url)
    {
        return Cache::remember(
            CacheEnum::SINGLE_TITLE->key($url),
            CacheEnum::SINGLE_TITLE->ttl(),
            function () use ($url) {
                return Title::query()->with('seasons.episodes')->where('url', $url)->first();
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
