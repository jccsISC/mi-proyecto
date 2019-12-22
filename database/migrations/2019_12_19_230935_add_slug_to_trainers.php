<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToTrainers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trainers', function (Blueprint $table) {
            //especificando que será unico dentro de nuestra entidad
            $table->string('slug')->unique()->nullable($value = true);//agregando nullable($value=true) permitimos agregar de forma correcta este campo unico y a la vez permite valores nulos desde laavel
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
            //especificar que hará despeus
            $table->dropColumn('slug');
        });
    }
}
