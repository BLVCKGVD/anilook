<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Enum\CacheEnum;
use App\Enum\Title\TitleStatusEnum;
use App\Models\Title\Title;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Checkbox;
use MoonShine\Fields\Date;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;

class TitleResource extends ModelResource
{
    protected string $model = Title::class;

    protected string $title = 'Тайтлы';

    public function fields(): array
    {
        return [
            Tabs::make([
                Tab::make('Основная информация', [
                    Grid::make([
                        Column::make([
                            Block::make([
                                Text::make('Наименование', 'title'),
                                Checkbox::make('Показывать на главной странице', 'show_in_main'),
                                Checkbox::make('Активен', 'is_active'),
                                Date::make('Дата выхода', 'released_at'),
                                Enum::make('Статус', 'status')
                                    ->attach(TitleStatusEnum::class)
                                    ->setLabel('Статус'),
                                HasMany::make('Сезоны', 'seasons')->showOnIndex(false),
                            ]),
                        ])->columnSpan(6),
                        Column::make([
                            Block::make([
                                TinyMce::make('Описание', 'description')
                                    ->menubar('none')
                                    ->toolbar('undo redo | blocks fontfamily fontsize')
                                    ->showOnIndex(false),
                                Image::make('Фото', 'image_url')
                                    ->multiple(true)
                                    ->removable(true)
                                    ->dir('/title_images')
                                    ->disk('public')
                                    ->allowedExtensions(['jpg', 'gif', 'png', 'webp']),
                                Text::make('Ссылка', 'url'),
                            ]),
                        ])->columnSpan(6),
                    ]),
                ]),
                Tab::make('Дополнительно', [
                    Grid::make([
                        Column::make([
                            Block::make([
                                Number::make('Позиция', 'position'),
                            ]),
                        ])->columnSpan(6),
                        Column::make([
                            Block::make([
                                Text::make('SEO Title', 'seo_title')
                                    ->showOnIndex(false),
                                Textarea::make('SEO Description', 'seo_description')
                                    ->showOnIndex(false),
                            ]),
                        ])->columnSpan(6),
                    ]),
                ]),
            ]),
        ];
    }

    public function search(): array
    {
        return ['id', 'title', 'description'];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    protected function afterCreated(Model $item): Model
    {
        if (is_null($item->position)) {
            $item->position = $item->id;
        }
        if (empty($item->url)) {
            $item->url = Str::slug($item->title.'-'.$item->id);
        }
        $item->save();
        $this->deleteCache($item);

        return $item;
    }

    protected function afterUpdated(Model $item): Model
    {
        if (empty($item->url)) {
            $item->url = Str::slug($item->title.'-'.$item->id);
        }
        $item->save();
        $this->deleteCache($item);

        return $item;
    }

    public function deleteCache($item = null): void
    {
        CacheEnum::TITLES->delete('main-page-titles');
        CacheEnum::SINGLE_TITLE->delete($item->url);
    }
}
