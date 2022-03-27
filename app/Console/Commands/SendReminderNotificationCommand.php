<?php

namespace App\Console\Commands;

use App\Models\Slot;
use App\Notifications\SlotReminderNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendReminderNotificationCommand extends Command
{
    protected int $hourOffset = 4;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'volunteering:send-reminder-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder notifications';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $from = Carbon::now();
        $to = $from->clone()->addHours($this->hourOffset);



        $slots = Slot::query()
            ->whereDate('sheduled_at', '>=', $from)
            ->whereDate('sheduled_at', '<=', $to)
            ->whereHas('shift', function ($query) use ($to, $from) {
                return $query
                    ->where('start_time', '>=', $from->format('H:i'))
                    ->where('start_time', '<=', $to->format('H:i'));
            })
            ->with(
                [
                    'user',
                    'point',
                    'shift',
                ]
            )
            ->get()
            ->each(function (Slot $slot) {
                $slot
                    ->createMailReminderToken()
                    ->save();

                $slot
                    ->user
                    ->notify(new SlotReminderNotification($slot));

                $slot
                    ->markAsSendMail();
            })
        ;


        return 0;
    }
}
