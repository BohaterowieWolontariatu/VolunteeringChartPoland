<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SlotController extends Controller
{

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $shift = $request->get('pointShift');
        if ($request->get('is_reserve') === false) {
            if ($shift['capacity'] <= count($shift['slots'])) {
                return Redirect::route('points.show', [
                    'point' => Point::find($shift['point_id'])
                ]);
            }
        }
        foreach ($shift['slots'] as $slot) {
            if ($slot['user_id'] === Auth::id()) {
                return Redirect::route('points.show', [
                    'point' => Point::find($shift['point_id'])
                ]);
            }
        }
        Slot::create([
            'point_id' => $shift['point_id'],
            'shift_id' => $shift['id'],
            'sheduled_at' => Carbon::create($request->get('schedule_at')),
            'user_id' => Auth::id(),
            'is_rejected' => false,
            'is_reserve' => (bool)$request->get('is_reserve'),
        ]);
        return Redirect::route('points.show', [
            'point' => Point::find($shift['point_id'])
        ]);
    }

    /**
     * @param Slot $slot
     * @return RedirectResponse
     */
    public function destroy(Slot $slot): RedirectResponse
    {
        $pointId = $slot->point_id;
        $slot->delete();
        return Redirect::route('points.show', [
            'point' => Point::find($pointId)
        ]);
    }
}
