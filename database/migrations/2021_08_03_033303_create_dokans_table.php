<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokans', function (Blueprint $table) {
            $table->string('uid')->unique();
            $table->string('title');
            $table->string('logo')->default("logo.png");
            $table->string('shop_type');
            $table->string('created_by');
            $table->string('updated_by')->nullable(true);
            $table->string('deleted_by')->nullable(true);
            $table->foreign('shop_type')->references('uid')->on('shop_types')->onDelete('cascade');
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
        Schema::dropIfExists('dokans');
    }
}
