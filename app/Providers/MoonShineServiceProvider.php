<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\EpisodeResource;
use App\MoonShine\Resources\SeasonResource;
use App\MoonShine\Resources\TitleResource;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn () => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn () => __('moonshine::ui.resource.role_title'),
                    new TitleResource()
                ),
                MenuItem::make(
                    static fn () => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn () => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),
            MenuGroup::make(static fn () => __('titles.titles'), [
                MenuItem::make(
                    static fn () => __('titles.titles'),
                    new TitleResource()
                ),
                MenuItem::make(
                    static fn () => __('seasons.seasons'),
                    new SeasonResource()
                ),
                MenuItem::make(
                    static fn () => __('episodes.episodes'),
                    new EpisodeResource()
                ),
            ]),
        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
