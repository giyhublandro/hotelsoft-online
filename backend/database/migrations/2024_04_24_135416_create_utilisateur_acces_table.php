<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateur_acces', function (Blueprint $table) {
               
            $table->increments('ID_ACCES');
            $table->string('CODE_PROFIL');
            $table->string('NOM_PROFIL');
            $table->integer('DASHBOARD');
            $table->integer('PLANNING');
            $table->integer('ARRIVEES');
            $table->integer('EN_CHAMBRES');
            $table->integer('DEPARTS');
            $table->integer('ATTRIBUER_CHAMBRE');
            $table->integer('MESSAGES');
            $table->integer('FACTURATION');
            $table->integer('CLOTURE');
            $table->integer('RAPPORT_RECEPTION');
            $table->integer('CARDEX');
            $table->integer('NOUVELLE_RESERVATION');
            $table->integer('MODIFIER_RESERVATION');
            $table->integer('FICHE_DE_POLICE');
            $table->integer('DISPONIBILITE_ET_TARIFS');
            $table->integer('PLAN_DE_CHAMBRE');
            $table->integer('RAPPORT_RESERVATION');
            $table->integer('STATUTS_DES_CHAMBRES');
            $table->integer('HISTORIQUES_DES_CHAMBRES');
            $table->integer('HORS_SERVICES');
            $table->integer('OBJETS_TROUVES_PERDUS');
            $table->integer('RAPPORT_SERVICE_ETAGE');
            $table->integer('CLIENT_EN_CHAMBRE_FACTURATION');
            $table->integer('PAYMASTER_FACTURATION');
            $table->integer('AU_COMPTANT_FACTURATION');
            $table->integer('RAPPORT_BAR_RESTAURANT');
            $table->integer('GESTION_DES_COMPTES');
            $table->integer('LISTE_DES_COMPTES');
            $table->integer('RECHARGE');
            $table->integer('CAUTIONS');
            $table->integer('RAPPORT_COMPTABILITE');
            $table->integer('FACTURES_AGEES');
            $table->integer('FACTURES_COMPTABILITE');
            $table->integer('CAISSE_PRINCIPALE');
            $table->integer('LETTRE_RELANCE');
            $table->integer('MOUVEMENT');
            $table->integer('INVENTAIRE');
            $table->integer('FICHE_DE_PRODUIT');
            $table->integer('FOURNISSEURS');
            $table->integer('RAPPORT_ECONOMAT');
            $table->integer('PETITE_CAISSE');
            $table->integer('GRANDE_CAISSE');
            $table->integer('PETIT_MAGAZIN');
            $table->integer('GRAND_MAGAZIN');
            $table->integer('SESSION_ADMIN');
            $table->integer('CONFIGURATION');
            $table->integer('SERVICE_TECHNIQUE');
            $table->integer('SECURITE');
            $table->integer('MENU_RECEPTION');
            $table->integer('MENU_RESERVATION');
            $table->integer('MENU_ADMINISTRATEUR');
            $table->integer('MENU_SERVICE_ETAGE');
            $table->integer('MENU_BAR_RESTAURANT');
            $table->integer('MENU_COMPTABILITE');
            $table->integer('MENU_ECONOMAT');
            $table->integer('CODE_UTILISATEUR');
            $table->integer('MENU_TECHNIQUE');
            $table->integer('PANNE');
            $table->integer('SOUS_PANNE');
            $table->integer('DEMANDE_INTERVENTION');
            $table->integer('INTERVENTION');
            $table->integer('RAPPORT_TECHNIQUE');
            $table->integer('RAPPORT_PROMOTEUR');
            $table->integer('RECHERCHER_RESA');
            $table->integer('NETTOYAGE');
            $table->integer('DEBUT_NETTOYAGE');
            $table->integer('FIN_NETTOYAGE');
            $table->integer('CONTROLLER_NETTOYAGE');
            $table->integer('ETAT_CHAMBRE');
            $table->integer('BON_COMMANDE');
            $table->integer('FICHE_TECHNIQUE');
            $table->integer('LISTE_DES_BONS');
            $table->integer('BON_RECEPTION');
            $table->integer('VALIDER');
            $table->integer('CONTROLER');
            $table->integer('COMMANDER');
            $table->integer('VERIFICATION');
            $table->integer('MAGASINS');
            $table->integer('CAISSE_PRINCIPALE_ECRITURE');
            $table->integer('CAISSE_PRINCIPALE_LECTURE');
            $table->integer('GESTION_BLOC_NOTES');
            $table->integer('APPROVISIONNEMENT');
            $table->integer('CORRECTIONS');
            $table->integer('FISCALITE');
            $table->integer('MENU_CUISINE');
            $table->integer('IMPRIMER_FB');
            $table->integer('GRATUITEE_HEBERGEMENT');
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
        Schema::dropIfExists('utilisateur_acces');
    }

};
