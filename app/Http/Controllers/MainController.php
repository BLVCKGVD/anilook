<?php

namespace App\Http\Controllers;

use App\Models\Title\Title;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        $titles = Title::query()->with( 'seasons.episodes')->where('is_active', true)->get();

        return view('main.index',
            [
                'titles' => $titles,
            ]
        );
    }
}
