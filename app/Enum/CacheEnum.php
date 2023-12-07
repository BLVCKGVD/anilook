<?php

namespace App\Enum;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

enum CacheEnum
{
    case TITLES;
    case SINGLE_TITLE;
    case SEASONS;
    case EPISODES;

    public function ttl(): int
    {
        return match ($this) {
            CacheEnum::SEASONS,
            CacheEnum::EPISODES => 60,
            CacheEnum::TITLES => 1800,
            default => 3600,
        };
    }

    public function key($id = null): string
    {
        return Str::slug(implode('-', [$this->name, $id]));
    }

    public function delete($id = null): void
    {
        Cache::delete($this->key($id));
    }
}
