<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            
            $table->string('date', 100);
            $table->string('place', 100);
            $table->string('cost', 100);
            $table->string('time_limit', 100);
            $table->string('others', 1000);
            $table->dropColumn('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('place');
            $table->dropColumn('cost');
            $table->dropColumn('time_limit');
            $table->dropColumn('others');
        });
    }
}
