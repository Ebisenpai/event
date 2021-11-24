<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_invitations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events');
            $table->bigInteger('inviting_user')->unsigned();
            $table->foreign('inviting_user')->references('id')->on('administrators');
            $table->bigInteger('invited_user')->unsigned();
            $table->foreign('invited_user')->references('id')->on('users');
            $table->timestamps();
            $table->binary('invitation_status')->nullable();
            $table->timestamp('accept_invitation_time')->nullable();
            $table->binary('paticipation_status')->default(0);
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
        Schema::dropIfExists('event_invitations');
    }
}
