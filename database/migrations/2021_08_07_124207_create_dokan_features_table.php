<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokanFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokan_features', function (Blueprint $table) {
            $table->string('uid')->unique();
            $table->string('dokan_uid');
            $table->foreign('dokan_uid')->references('uid')->on('dokans')->onDelete('cascade');
            $table->string('features_uid');
            $table->foreign('features_uid')->references('uid')->on('features')->onDelete('cascade');
            $table->string('created_by');
            $table->foreign('created_by')->nullable()->references('uid')->on('users')->onDelete('cascade');
            $table->string('updated_by')->nullable();
            $table->foreign('updated_by')->nullable()->references('uid')->on('users')->onDelete('cascade');
            $table->string('deleted_by')->nullable();
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
        Schema::dropIfExists('dokan_features');
    }
}
