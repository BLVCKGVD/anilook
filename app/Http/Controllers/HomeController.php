<?php

namespace App\Http\Controllers;

use App\Components\Home;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $home = new Home(request());
        $home = $home->getHomePage();

        return view('main.index',
            [
                'titles' => $home['titles'],
                'seasons' => $home['seasons'],
            ]
        );
    }
}
