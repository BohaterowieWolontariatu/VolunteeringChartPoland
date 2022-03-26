<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
        'start_time',
        'end_time',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function point(): BelongsTo
    {
        return $this->belongsTo(Point::class);
    }

    public function slots() {
        return $this->hasMany(Slot::class);
    }
}
