<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('auth_code');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->string('placed_location')->nullable();
            $table->string('type');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('devices')->insert([
                'auth_code' => bcrypt('MQ135'),
            'owner_id' => 1,
            'placed_location'=>"matara",
            'type' => "AMC123"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
