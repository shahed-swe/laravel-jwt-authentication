<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_shifts', function (Blueprint $table) {
            $table->string('uid')->unique();
            $table->string('title');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('weekend');
            $table->float('daily_break_duration');
            $table->string('dokan_uid');
            $table->foreign('dokan_uid')->references('uid')->on('dokans')->onDelete('cascade');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->foreign('created_by')->references('uid')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('uid')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('uid')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('employee_shifts');
    }
}
