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
        Schema::create('reservation', function (Blueprint $table) {

            $table->increments('ID_RESERVATION');
            $table->string('CODE_RESERVATION');
            $table->string('CLIENT_ID');
            $table->string('UTILISATEUR_ID');
            $table->string('CHAMBRE_ID');
            $table->string('AGENCE_ID');
            $table->string('NOM_CLIENT');
            $table->date('DATE_ENTTRE');
            $table->dateTime('HEURE_ENTREE');
            $table->date('DATE_SORTIE');
            $table->dateTime('HEURE_SORTIE');
            $table->integer('ADULTES');
            $table->integer('NB_PERSONNES');
            $table->integer('ENFANTS');
            $table->integer('RECEVOIR_EMAIL');
            $table->integer('RECEVOIR_SMS');
            $table->integer('ETAT_RESERVATION');
            $table->date('DATE_CREATION');
            $table->string('HEURE_CREATION');
            $table->Double('MONTANT_TOTAL_CAUTION');
            $table->string('MOTIF_ETAT');
            $table->date('DATE_ETAT');
            $table->double('MONTANT_ACCORDE');
            $table->string('GROUPE');
            $table->string('CHECKIN');
            $table->string('TYPE');
            $table->double('PETIT_DEJEUNER');
            $table->double('SOLDE_RESERVATION');
            $table->string('SOURCE_RESERVATION');
            $table->double('PETIT_DEJEUNER_ROUTAGE');
            $table->string('CHAMBRE_ROUTAGE');
            $table->string('VENANT_DE');
            $table->string('SE_RENDANT_A');
            $table->string('RAISON');
            $table->string('ROUTAGE');
            $table->string('ETAT_NOTE_RESERVATION');
            $table->string('CODE_ENTREPRISE');
            $table->string('NOM_ENTREPRISE');
            $table->integer('AFFICHER_PRIX');
            $table->double('DEPOT_DE_GARANTIE');
            $table->integer('DAY_USE');
            $table->integer('MENSUEL');
            $table->string('BC_ENTREPRISE');
            $table->dateTime('DATE_DE_CONTROLE');
            $table->string('TYPE_CHAMBRE');
            $table->integer('FSC');
            $table->integer('LIEN_GOOGLE_MAP');
            $table->double('BFK_COST');
            $table->double('TYPE_RESERVATION');
        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
};
