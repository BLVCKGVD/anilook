<?php

declare(strict_types=1);

namespace App\MoonShine\Layout;

use MoonShine\Components\Layout\Content;
use MoonShine\Components\Layout\Flash;
use MoonShine\Components\Layout\Footer;
use MoonShine\Components\Layout\Header;
use MoonShine\Components\Layout\LayoutBlock;
use MoonShine\Components\Layout\LayoutBuilder;
use MoonShine\Components\Layout\Menu;
use MoonShine\Components\Layout\Sidebar;
use MoonShine\Contracts\MoonShineLayoutContract;

final class Layout implements MoonShineLayoutContract
{
    public static function build(): LayoutBuilder
    {
        return LayoutBuilder::make([
            Sidebar::make([
                Menu::make()->customAttributes(['class' => 'mt-2']),
            ]),
            LayoutBlock::make([
                Flash::make(),
                Header::make(),
                Content::make(),
                Footer::make()->copyright(fn (): string => <<<'HTML'
                        &copy; 2023 Anilook
                    HTML),
            ])->customAttributes(['class' => 'layout-page']),
        ]);
    }
}
