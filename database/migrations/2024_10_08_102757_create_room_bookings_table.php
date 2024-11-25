<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->id();
			$table->date('check_in_date');
			$table->mediumInteger("days");
			$table->mediumInteger("room_type_id");
			$table->string('selected_rooms');
			$table->string('customer_name');
			$table->string('company_name')->nullable();
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->mediumInteger("pin_code");
			$table->string('gender');
			$table->string('email');
			$table->string('phone');
			$table->string('id_proof');
			$table->string('id_proof_document');
			$table->tinyInteger('is_payment')->default(0);
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
        Schema::dropIfExists('room_bookings');
    }
}
