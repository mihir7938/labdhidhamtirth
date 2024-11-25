<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('entry', 20);
			$table->time('checkintime');
			$table->time('checkouttime');
			$table->bigInteger("created_by")->unsigned();
            $table->foreign("created_by")->references("id")->on("users")->onDelete("cascade");
            $table->bigInteger("updated_by")->unsigned();
            $table->foreign("updated_by")->references("id")->on("users")->onDelete("cascade");
            $table->timestamps();
			$table->string('isprint', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_types');
    }
}
