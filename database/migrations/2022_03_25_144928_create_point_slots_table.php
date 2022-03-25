<?php

use App\Models\Point;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Point::class)->constrained();
            $table->foreignIdFor(Shift::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->date('shedule_at')->index();

            $table->boolean('is_rejected')->default(false);
            $table->boolean('is_reserve')->default(false);


            $table->dateTime('rejected_at')->nullable();
            $table->dateTime('confirmed_at')->nullable();

            $table->dateTime('mail_reminder_send_at')->nullable();
            $table->string('mail_reminder_token')->nullable();

            $table->dateTime('sms_reminder_send_at')->nullable();
            $table->string('sms_reminder_token')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point_slots');
    }
}
