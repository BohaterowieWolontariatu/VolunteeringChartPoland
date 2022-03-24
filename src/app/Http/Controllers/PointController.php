<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePointRequest;
use App\Http\Requests\UpdatePointRequest;
use App\Http\Resources\PointResource;
use App\Models\Point;
use Illuminate\Http\Response;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $points = Point::query()
            ->orderBy('name')
            ->paginate();

        return PointResource::collection($points);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StorePointRequest $request): Response
    {
        $point = new Point();
        $point->fill($request->validated());
        $point->save();

        return response()->json(null, Response::HTTP_CREATED);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePointRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePointRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Point $point)
    {
        //
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
     * @param  \App\Http\Requests\UpdatePointRequest  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePointRequest $request, Point $point)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point)
    {
        //
    }
}
