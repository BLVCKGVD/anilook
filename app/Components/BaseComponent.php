<?php

namespace App\Components;

use Illuminate\Http\Request;

abstract class BaseComponent
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
