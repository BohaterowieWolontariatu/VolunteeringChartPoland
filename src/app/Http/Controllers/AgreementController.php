<?php

namespace App\Http\Controllers;

use Inertia\Inertia;


class AgreementController extends Controller
{
    public function create()
    {
        return Inertia::render('Agreement/Create');
    }
}
