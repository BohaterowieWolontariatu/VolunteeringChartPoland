<?php

namespace App\Http\Classes;

use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class PointsAdditionalData
{
    public function countFreeSlotsForPoints(LengthAwarePaginator $points): LengthAwarePaginator
    {
        $today = Carbon::now();
        $tomorrow = $today->clone()->addDays(1);
        $dayAfterTomorrow = $today->clone()->addDays(2);

        foreach ($points as $point) {
            $dayCapacity = 0;
            foreach ($point->shifts as $shift) {
                $dayCapacity += $shift->capacity;
            }

            $point->_fee_slots_today = $dayCapacity - Slot::where(
                    [
                        'sheduled_at' => $today->toDateString(),
                        'point_id' => $point->id,
                    ]
                )->count();

            $point->_fee_slots_tommorow = $dayCapacity - Slot::where(
                    [
                        'sheduled_at' => $tomorrow->toDateString(),
                        'point_id' => $point->id,
                    ]
                )->count();

            $point->_fee_slots_day_after_tomorrow = $dayCapacity - Slot::where(
                    [
                        'sheduled_at' => $dayAfterTomorrow->toDateString(),
                        'point_id' => $point->id,
                    ]
                )->count();
        }

        return $points;
    }
}