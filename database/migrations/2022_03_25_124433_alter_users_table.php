<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name');
            $table->string('pesel')->after('surname');
            $table->boolean('is_active')->default(1)->after('email_verified_at')->nullable();
            $table->boolean('has_agreement_signed')->default(0)->after('is_active');
            $table->string('phone')->nullable()->after('has_agreement_signed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
               'surname',
               'pesel',
               'is_active',
               'has_agreement_signed',
               'phone'
            ]);
        });
    }
}
