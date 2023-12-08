<?php

namespace App\Http\Controllers;

use App\Components\TitleComponent;
use Illuminate\View\View;

class TitleController extends Controller
{
    public function show($url): View
    {
        $title = new TitleComponent(request());
        $title = $title->getTitle($url);
        if (empty($title)) {
            abort(404);
        }

        return view('main.title',
            [
                'title' => $title,
            ]
        );
    }
}
