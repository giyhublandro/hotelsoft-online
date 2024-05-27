<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societe', function (Blueprint $table) {

            $table->increments('ID_SOCIETE');
            $table->string('CODE_SOCIETE');
            $table->string('RAISON_SOCIALE');
            $table->string('VILLE');
            $table->string('BOITE_POSTALE');
            $table->string('PAYS');
            $table->string('TELEPHONE');
            $table->string('FAX');
            $table->string('EMAIL');
            $table->string('RUE');
            $table->string('NUM_CONTRIBUABLE');
            $table->string('NUM_REGISTRE');
            $table->Double('TAUX_CHAMBRE');
            $table->Double('TAUX_TVA');
            $table->Double('TAUX_REPAS');
            $table->Double('TAUX_PRODUIT');
            $table->string('CODE_MONNAIE');
            $table->string('CODE_AGENCE_ACTUEL');
            $table->date('DATE_CREATION');
            $table->string('LOGO');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('societe');
    }
};
