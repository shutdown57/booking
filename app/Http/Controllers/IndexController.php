<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    /**
     * Home page
     */
    public function index(): \Inertia\Response
    {
        return Inertia('Index');
    }
}
