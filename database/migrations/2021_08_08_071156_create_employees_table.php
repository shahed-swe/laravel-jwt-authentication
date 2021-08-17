<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('uid')->unique();
            $table->string('user_uid');
            $table->foreign('user_uid')->references('uid')->on('users')->onDelete('cascade');
            $table->string('shift_uid');
            $table->foreign('shift_uid')->references('uid')->on('employee_shifts')->onDelete('cascade');
            $table->string('age');
            $table->float('monthly_salary');
            $table->float('overtime_rate');
            $table->float('advance_taken');
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
        Schema::dropIfExists('employees');
    }
}
