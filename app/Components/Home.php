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

    private function getTitles() {
        return Cache::remember(
            'titles',
            CacheEnum::TITLES->ttl(),
            function () {
                return Title::query()->with('seasons.episodes')->get()->toArray();
            }
        );
    }
}
