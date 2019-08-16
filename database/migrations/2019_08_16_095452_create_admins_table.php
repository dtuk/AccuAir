<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->smallInteger('level')->default(1);
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('admins')->insert([
            [
                'user_id' => 1,
            ],
            [
                'user_id' => 2,
            ],
            [
                'user_id' => 3,
            ],
            [
                'user_id' => 4,
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
