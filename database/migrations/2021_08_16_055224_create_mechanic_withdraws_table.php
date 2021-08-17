<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMechanicWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechanic_withdraws', function (Blueprint $table) {
            $table->string('uid')->unique();
            $table->string('mechanic_uid')->nullable(false);
            $table->foreign('mechanic_uid')->references('uid')->on('mechanics')->onDelete('cascade');
            $table->date("withdraw_date");
            $table->float("amount", 8, 2);
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->foreign('created_by')->references('uid')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->nullable()->references('uid')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->nullable()->references('uid')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('mechanic_withdraws');
    }
}
