<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('uid')->unique();
            $table->string('user_uid')->nullable(false);
            $table->foreign('user_uid')->references('uid')->on('users')->onDelete('cascade');
            $table->string('dokan_uid')->nullable(false);
            $table->foreign('dokan_uid')->references('uid')->on('dokans')->onDelete('cascade');
            $table->float('total_purchase')->nullable();
            $table->float('total_due')->nullable();
            $table->string('last_payback')->nullable();
            $table->string('nid')->nullable();
            $table->string('nid_front_scan_copy')->nullable();
            $table->string('nid_back_scan_copy')->nullable();
            $table->string('image')->nullable();
            $table->text('note')->nullable();
            $table->string('street_address')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('post_office')->nullable();
            $table->string('upzilla')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
