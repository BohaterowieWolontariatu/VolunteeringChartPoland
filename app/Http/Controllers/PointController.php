<?php

namespace App\Http\Controllers;

use App\Http\Requests\Point\StorePointRequest;
use App\Http\Requests\Point\UpdatePointRequest;
use App\Models\Point;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $points = Point::query()
            ->orderBy('name')
            ->with('shifts')
            ->paginate();


        return Inertia::render('Point/Index', [
           'points' => $points
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Point\StorePointRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePointRequest $request)
    {
        Point::create($request->validated());

        return Redirect::route('points.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Inertia\Response
     */
    public function show(Point $point)
    {
        return Inertia::render('Point/Show', [
           'point' => $point
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $point)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Point\UpdatePointRequest $request
     * @param \App\Models\Point $point
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePointRequest $request, Point $point): RedirectResponse
    {
        $point->update($request->validated());

        return Redirect::route('points.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Point $point
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Point $point): RedirectResponse
    {
        $point->delete();

        return Redirect::route('points.index');
    }
}
