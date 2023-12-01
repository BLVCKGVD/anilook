<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Season\Season;
use App\Models\Title\Title;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Metrics\ValueMetric;
use MoonShine\Pages\Page;

class Dashboard extends Page
{
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title(),
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Домашняя страница';
    }

    public function components(): array
    {
        return [
            Grid::make([
                Column::make([
                    ValueMetric::make('Количество тайтлов')
                        ->value(Title::query()->count()),
                ])->columnSpan(4),
                Column::make([
                    ValueMetric::make('Количество сезонов')
                        ->value(Season::query()->count()),
                ])->columnSpan(4),
            ]),

        ];
    }
}
