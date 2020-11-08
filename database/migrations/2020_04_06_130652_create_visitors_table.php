<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vuid')->unique();
            $table->string('name', 40);
            $table->string('email', 40)->unique();
            $table->string('phone', 40)->unique();
            $table->string('address')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_employee_id')->nullable();
            $table->string('national_identification_no')->nullable();
            $table->unsignedTinyInteger('status');
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
        Schema::dropIfExists('visitors');
    }
}
