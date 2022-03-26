<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Slot extends Model
{
    use HasFactory;

    protected $fillable = [
        'sheduled_at',
        'is_rejected',
        'is_reserve',

        'rejected_at',
        'confirmed_at',

        'mail_reminder_send_at',
        'mail_reminder_token',

        'sms_reminder_send_at',
        'sms_reminder_token',
    ];


    public function point() {
        return $this->belongsTo(Point::class);
    }


    public function shift() {
        return $this->belongsTo(Shift::class);
    }


    public function user() {
        return $this->belongsTo(User::class);
    }


    protected function createMailReminderToken() {
        $token = Str::random(128);

        $this->mail_reminder_token = hash('sha256', $token);

        return $this;
    }

}
