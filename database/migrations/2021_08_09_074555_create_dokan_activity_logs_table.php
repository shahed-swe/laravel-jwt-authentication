<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokanActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokan_activity_logs', function (Blueprint $table) {
            $table->bigIncrements('uid')->unique();
            $table->string('dokan_id');
            $table->foreign('dokan_id')->references('uid')->on('dokans')->onDelete('cascade');
            $table->string('type');
            $table->text('description');
            $table->timestamp('date_time',0)->nullable(false);
            $table->string('created_by')->nullable(false);
            $table->foreign('created_by')->references('uid')->on('users')->onDelete('cascade');
            $table->string('updated_by')->nullable(true);
            $table->foreign('updated_by')->references('uid')->on('users')->onDelete('cascade');
            $table->string('deleted_by')->nullable(true);
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
        Schema::dropIfExists('dokan_activity_logs');
    }
}
