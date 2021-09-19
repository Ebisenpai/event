<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventInvitaionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_invitaions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('inviting_user')->unsigned();
            $table->foreign('inviting_user')->references('id')->on('administrators');
            $table->bigInteger('invited_user')->unsigned();
            $table->foreign('invited_user')->references('id')->on('users');
            $table->timestamps();
            $table->binary('invitation_status');
            $table->timestamp('accept_invitation_time')->nullable();
            $table->binary('paticipation_status');
            $table->timestamp('accept_paticipation_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_invitaions');
    }
}
