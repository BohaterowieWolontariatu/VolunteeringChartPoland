<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Point\StorePointRequest;
use App\Models\Point;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $points = Point::query()
            ->orderBy('name')
            ->orderBy('address')
            ->get();

        return Inertia::render('Admin/Point/Index', [
            'points' => $points,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Point/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePointRequest $request
     * @return RedirectResponse
     */
    public function store(StorePointRequest $request): RedirectResponse
    {
        Point::create($request->validated());

        return Redirect::route('admin.points.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Point $point
     * @return Response
     */
    public function edit(Point $point): Response
    {
        return Inertia::render('Admin/Point/Edit', [
            'point' => $point,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  Point  $point
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Point $point)
    {
        $point->delete();
        return Redirect::route('admin.points.index');
    }
}
