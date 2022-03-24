<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePointRequest;
use App\Http\Requests\UpdatePointRequest;
use App\Http\Resources\PointResource;
use App\Models\Point;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

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
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePointRequest $request
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function store(StorePointRequest $request): JsonResource
    {
        $point = new Point($request->validated());
        $point->save();

        return PointResource::make($point);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Point $point
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(Point $point): JsonResource
    {
        return PointResource::make($point);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePointRequest $request
     * @param \App\Models\Point $point
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function update(UpdatePointRequest $request, Point $point): JsonResource
    {
        $point->update($request->validated());
        return PointResource::make($point);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point): ?Response
    {
        $point->delete();

        return null;
    }
}
