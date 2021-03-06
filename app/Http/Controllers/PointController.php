<?php

namespace App\Http\Controllers;

use App\Http\Classes\PointsAdditionalData;
use App\Http\Requests\Point\StorePointRequest;
use App\Http\Requests\Point\UpdatePointRequest;
use App\Models\Point;
use App\Models\Shift;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

        $pointsAdditionalData = new PointsAdditionalData();

        $points = $pointsAdditionalData->countFreeSlotsForPoints($points);

        return Inertia::render('Point/Index', [
            'points' => $points,
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
     * @param \App\Http\Requests\Point\StorePointRequest $request
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
     * @param \App\Models\Point $point
     * @return \Inertia\Response
     */
    public function show(Point $point, Request $request)
    {
        $dayRange = 2;

        $date = $request->get('date', 'now');
        $startDate = Carbon::make($date);
        $endDate = $startDate->clone()->addDays($dayRange);

        $point->load(
            [
                'shifts',
                'slots' => fn($query) => $query
                    ->whereBetween('sheduled_at', [$startDate->toDateString(), $endDate->toDateString()])
                    ->orderBy('sheduled_at'),
                'slots.user',
            ]
        );

        $point->slots->groupBy('sheduled_at');
        $point->schedules = collect();

        for ($iDate = $startDate->clone(); $iDate <= $endDate; $iDate = $iDate->addDay()) {
            $point->schedules->push(
                [
                    'capacity_sum' => $point->shifts->sum('capacity'),
                    'sheduled_at' => $iDate->clone(),
                    'shifts' => $point->shifts->map(function (Shift $shift) use ($iDate, $point) {
                        $aShift = $shift->toArray();
                        $aShift['slots'] = $point->slots
                            ->filter(function (Slot $slot) use ($shift, $iDate) {
                                return $iDate->isSameDay($slot->sheduled_at) && $slot->shift_id === $shift->id;
                            })
                            ->values();
                        return $aShift;
                    }),
                ]
            );
        }
        return Inertia::render('Point/Show', [
            'point' => $point,
            'date' => $startDate->format('Y-m-d'),
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Point $point
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
