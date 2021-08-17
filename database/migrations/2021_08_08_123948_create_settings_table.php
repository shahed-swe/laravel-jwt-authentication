<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('uid')->unique();
            $table->string('dokan_uid');
            $table->foreign('dokan_uid')->references('uid')->on('dokans')->onDelete('cascade');
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("street_address")->nullable();
            $table->string("post_office")->nullable();
            $table->string("post_code")->nullable();
            $table->string("upzilla")->nullable();
            $table->string("district")->nullable();
            $table->string("division")->nullable();
            $table->boolean("system_notification")->default(true);
            $table->boolean("sms_notification")->default(true);
            $table->boolean("email_notification")->default(true);
            $table->boolean("unseen_message_notification")->default(true);
            $table->boolean("ecommerce_notification")->default(true);
            $table->boolean("purchase_notification_for_customer")->default(true);
            $table->boolean("customer_messaging")->default(true);
            $table->boolean("supplier_messaging")->default(true);
            $table->boolean("system_messaging")->default(true);
            $table->boolean("adds_on_messenger")->default(true);
            $table->boolean("two_factor_authentication")->default(false);
            $table->boolean("unauthorized_login_notification")->default(true);
            $table->string("invoice_size")->default("A4");
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
