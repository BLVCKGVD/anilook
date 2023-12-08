<?php

namespace App\Http\Controllers;

use App\Components\Home;
use App\Components\SeasonComponent;
use App\Components\TitleComponent;
use Illuminate\View\View;

class SeasonController extends Controller
{
    public function show($url): View
    {
        $component = new SeasonComponent(request());
        $season = $component->getSeason($url);
        if (empty($season)) {
            abort(404);
        }
        return view('main.season',
            [
                'season' => $season,
            ]
        );
    }
}
