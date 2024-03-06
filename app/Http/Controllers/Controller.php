<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Render inertia components
     */
    public function render($view, $options = [], $layout = "app")
    {
        $inertia = $this->inertia()::render($view, $options);

        $inertia->rootView($layout);

        return $inertia;
    }

    /**
     * Initiate inertia instance
     */
    public function inertia()
    {
        return new Inertia;
    }
}
