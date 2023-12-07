<?php

namespace App\Components;

use App\Enum\CacheEnum;
use App\Models\Title\Title;
use Illuminate\Support\Facades\Cache;

class Home extends BaseComponent
{
    public function getHomePage(): array
    {
        $result = [];
        $result['titles'] = $this->getTitles();

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
                    ->orderBy('position', 'desc')
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
}
