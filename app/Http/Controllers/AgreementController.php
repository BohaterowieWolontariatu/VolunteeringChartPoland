<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgreementRequest;
use App\Mail\ConfirmationOfVolunteering;
use App\Models\Agreement;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class AgreementController extends Controller
{
    public function create()
    {
        Mail::to(auth('sanctum')->user()->email)->send(new ConfirmationOfVolunteering());
        return Inertia::render('Agreement/Create');
    }

    public function store(StoreAgreementRequest $request)
    {
        $data = array_merge($request->validated(), ['user_id' =>  auth('sanctum')->id()]);
        Agreement::create($data);

        $user = auth('sanctum')->user();
        $user->has_agreement_signed = true;
        $user->save();

        return Redirect::route('points.index');
    }
}
