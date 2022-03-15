<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedecinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medecins', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nom', 30);
            $table->string('prenom', 30);
            $table->string('adresse', 80);
            $table->string('tel', 15)->nullable();
            $table->string('specialiteComplementaire', 50)->nullable();
            $table->integer('departement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medecins');
    }
}
