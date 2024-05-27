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
        Schema::create('agence', function (Blueprint $table) {

            $table->increments('ID_AGENCE');
            $table->string('WHATSAPP_6');
            $table->string('WHATSAPP_7');
            $table->string('EMAIL_6');
            $table->string('EMAIL_7');
            $table->string('NOM_AGENCE');
            $table->string('CODE_AGENCE');
            $table->string('FAX');
            $table->string('EMAIL');
            $table->string('TELEPHONE');
            $table->string('VILLE');
            $table->string('BOITE_POSTALE');
            $table->string('PAYS');
            $table->string('RUE');
            $table->string('CATEGORIE_HOTEL');
            $table->string('COULEUR_THEME');
            $table->dateTime('DATE_CREATION');
            $table->integer('ETAGE');
            $table->integer('SOUS_SOLE');
            $table->string('CHEMIN_HOTEL_LOCK_SYSTEM');
            $table->integer('GERER_STOCK');
            $table->string('WHATSAPP_1');
            $table->string('WHATSAPP_2');
            $table->string('WHATSAPP_3');
            $table->string('WHATSAPP_4');
            $table->string('WHATSAPP_5');
            $table->integer('CLOTURE_MULTIPLE');
            $table->string('CHEMIN_SAUVEGARDE_AUTO');
            $table->integer('SESSION_UNIQUE');
            $table->dateTime('DATE_DE_CONTROLE');
            $table->integer('TARIFICATION_DYNAMIQUE');
            $table->integer('SERRURES');
            $table->string('EMAIL_1');
            $table->string('EMAIL_2');
            $table->string('EMAIL_3');
            $table->string('EMAIL_4');
            $table->string('EMAIL_5');
            $table->double('FISCALITE');
            $table->integer('MESSAGE_WHATSAPP');
            $table->integer('CLOTURE_FACTURE');
            $table->integer('PRIX_BAR_RESTAU_MODIFIABLE');
            $table->integer('PAYER_AVANT_ENCODAGE');
            $table->integer('LANGUE');
            $table->integer('BLOQUER_PRIX_HEBERGEMENT');
            $table->string('LIEN_GOOGLE_MAP');
            $table->integer('CLUB_ELITE');
            $table->integer('PRINT_B7');
            $table->integer('MENSUALITE');
            $table->string('NUMERO_RECEPTION');
            $table->string('NUMERO_RECEPTION_CHAMBRE');
            $table->string('DIRECTION');
            $table->double('MONTANT_NAVETTE');
            $table->string('CACHET');
            $table->integer('RAPPORT_AUTO');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agence');
    }
};
