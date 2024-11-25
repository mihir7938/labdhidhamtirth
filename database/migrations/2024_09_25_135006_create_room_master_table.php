<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_master', function (Blueprint $table) {
            $table->id();
			$table->string('entry', 20);
			$table->integer("roomtypeid");
            $table->foreign("roomtypeid")->references("id")->on("room_types")->onDelete("cascade");
			$table->string('roomname');
			$table->integer("gstid");
			$table->integer("lgstid");
			$table->float("limitamount");
			$table->integer("noofbed");
			$table->float("extrabedamt");
			$table->float("amount");
			$table->float("resevamt");
			$table->float("discperc");
			$table->char("isactive", 1);
			$table->string('hsncode', 20);
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
        Schema::dropIfExists('room_master');
    }
}
