<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgreementRequest;
use App\Models\Agreement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;


class AgreementController extends Controller
{
    public function create()
    {
        return Inertia::render('Agreement/Create');
    }

    public function store(StoreAgreementRequest $request)
    {
        $data = array_merge($request->validated(), ['user_id' =>  Auth::id()]);
        Agreement::create($data);

        return Redirect::route('dashboard');
    }
}
