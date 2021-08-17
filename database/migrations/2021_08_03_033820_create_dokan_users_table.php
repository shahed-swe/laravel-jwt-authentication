<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokanUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokan_users', function (Blueprint $table) {
            $table->string('uid')->unique();
            $table->string('user_uid');
            $table->foreign('user_uid')->references('uid')->on('users')->onDelete('cascade');
            $table->string('dokan_uid');
            $table->foreign('dokan_uid')->references('uid')->on('dokans')->onDelete('cascade');
            $table->enum('role',['admin','employee'])->default('admin');
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
        Schema::dropIfExists('dokan_users');
    }
}
