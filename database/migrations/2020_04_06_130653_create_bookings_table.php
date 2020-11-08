<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no')->unique();
            $table->longText('purpose');
            $table->unsignedTinyInteger('status');
            $table->boolean('is_pre_register');
            $table->unsignedTinyInteger('is_group_enabled');
            $table->integer('invitation_people_count')->default(0);
            $table->integer('accept_invitation_count')->default(0);
            $table->integer('attendee_count')->default(0);
            $table->dateTimeTz('start_at');
            $table->dateTimeTz('end_at');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('employee_id');
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
        Schema::dropIfExists('bookings');
    }
}
