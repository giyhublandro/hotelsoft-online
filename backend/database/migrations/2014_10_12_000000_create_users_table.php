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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->increments('ID_UTILISATEUR');
            $table->string('CODE_UTILISATEUR')->unique();
            $table->string('NOM_UTILISATEUR');
            $table->string('GRIFFE_UTILISATEUR')->unique();
            $table->string('CATEG_UTILISATEUR');
            $table->integer('AGENCE_TRAV_NUMBER');
            $table->integer('AGENCE_CREATE_NUMBER');
            $table->string('PASSWORD_UTILISATEUR');
            $table->dateTime('DEBUT_ACCES');
            $table->dateTime('FIN_ACCES');
            $table->string('NOM_CONNEXION');
            $table->dateTime('DATE_CHANGE_PWD');
            $table->dateTime('DATE_CREATION');
            $table->dateTime('DATE_EXPIRATION');
            $table->dateTime('DATE_DERNIERE_MAJ');
            $table->string('POSTE_UTILISATEUR');
            $table->string('CODE_UTILISATEUR_MAJ');
            $table->integer('ETAT_UTILISATEUR');
            $table->string('CODE_UTILISATEUR_CREA');
            $table->integer('PEUT_FAIRE_REMISE');
            $table->integer('PRIX_VENTE_MODIFIABLE');
            $table->integer('PEUT_FAIRE_DEDUCTION_CLIENT');
            $table->integer('PEUT_ANNULER_COMMANDE');
            $table->integer('PEUT_CLOTURER_MAIN_COURANTE');
            $table->integer('CONNEXION_DISTANTE');
            $table->integer('PEUT_ATTRIBUER_GRATUITE');
            $table->integer('PEUT_MODIFIER_TAXE_SEJOUR');
            $table->string('LANGUE_PAR_DEFAUT');
            $table->string('NUM_AGENCE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
};
