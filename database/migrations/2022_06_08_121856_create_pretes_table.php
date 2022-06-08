<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePretesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pretes', function (Blueprint $table) {
            $table->foreignId('client_id')->constrained();
            $table->foreignId('livre_id')->constrained();
            $table->dateTime("dateDebut");
            $table->dateTime("dateFin");
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
        Schema::dropIfExists('pretes');
    }
}
