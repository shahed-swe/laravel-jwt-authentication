<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokanInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokan_invites', function (Blueprint $table) {
            $table->string('uid')->uniqid();
            $table->string('invited_by')->nullable(false);
            $table->foreign('invited_by')->references('uid')->on('users')->onDelete('cascade');
            $table->string('dokan_uid')->nullable(false);
            $table->foreign('dokan_uid')->references('uid')->on('users')->onDelete('cascade');
            $table->enum('role', ['admin','staff']);
            $table->timestamp('expired_at',0)->nullable(false);
            $table->string('invitation_to');
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
        Schema::dropIfExists('dokan_invites');
    }
}
