<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatarToTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*hace referencia a nuestra tabla trainers */
        Schema::table('trainers', function (Blueprint $table) {
            //le agregaremos un nuevo campo
            $table->string('avatar');//sera tipo string donde se gurdara la imagen
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trainers', function (Blueprint $table) {
            //
        });
    }
}
