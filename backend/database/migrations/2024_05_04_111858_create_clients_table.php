<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
           
            $table->increments('ID_CLIENT');
            $table->string('CODE_CLIENT');
            $table->string('NOM_CLIENT');
            $table->string('NOM_PRENOM');
            $table->string('NOM_JEUNE_FILLE');
            $table->string('PRENOMS');
            $table->string('ADRESSE');
            $table->string('TELEPHONE');
            $table->string('FAX');
            $table->string('EMAIL');
            $table->string('NUM_COMPTE');
            $table->string('NATIONALITE');
            $table->date('DATE_DE_NAISSANCE');
            $table->string('LIEU_DE_NAISSANCE');
            $table->string('PAYS_RESIDENCE');
            $table->string('VILLE_DE_RESIDENCE');
            $table->string('PROFESSION');
            $table->string('CNI');
            $table->string('CODE_MODE_PAIEMENT');
            $table->string('NUM_COMPTE_COLLECTIF');
            $table->date('DATE_CREATION');
            $table->string('CODE_UTILISATEUR_CREA');
            $table->date('DATE_MODIFICATION');
            $table->integer('RECEVOIR_EMAIL');
            $table->integer('RECEVOIR_SMS');
            $table->string('TYPE_CLIENT');
            $table->string('SITE_INTERNET');
            $table->string('CODE_AGENCE');
            $table->string('CODE_UTILISATEUR_MODIF');
            $table->string('CODE_ENTREPRISE');
            $table->string('MODE_TRANSPORT');
            $table->string('NUM_VEHICULE');
            $table->string('MARQUE_VEHICULE');
            $table->integer('TVA');
            $table->string('CIVILITE');
            $table->string('CODE_ELITE');
            $table->string('AGENCE');
            $table->dateTime('DATE_DE_CONTROLE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
