<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicings', function (Blueprint $table) {
            $table->string('uid')->unique();
            $table->string('dokan_uid');
            $table->foreign('dokan_uid')->references('uid')->on('dokans')->onDelete('cascade');
            $table->string('customer_uid');
            $table->foreign('customer_uid')->references('uid')->on('customers')->onDelete('cascade');
            $table->string('mechanic_uid');
            $table->foreign('mechanic_uid')->references('uid')->on('mechanics')->onDelete('cascade');
            $table->string('device_name')->nullable();
            $table->string('device_model')->nullable();
            $table->date("received_date")->nullable();
            $table->date("delivery_date")->nullable();
            $table->float("total_fee", 8, 2)->default(0);
            $table->float("advance_payment", 8, 2)->default(0);
            $table->float("total_cost", 8, 2)->default(0);
            $table->float("service_charge", 8, 2)->default(0);
            $table->float("shop_profit", 8, 2)->default(0);
            $table->float("mechanic_profit", 8, 2)->default(0);
            $table->text("description")->nullable();
            $table->string("status")->default("Processing");
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
        Schema::dropIfExists('servicings');
    }
}
