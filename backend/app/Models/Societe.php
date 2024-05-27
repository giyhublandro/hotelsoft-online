<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;

    protected $fillable= [
        
        'CODE_SOCIETE',
        'RAISON_SOCIALE',
         'VILLE',
         'BOITE_POSTALE',
         'PAYS',
         'TELEPHONE',
         'FAX',
         'EMAIL',
         'RUE',
         'NUM_CONTRIBUABLE',
         'NUM_REGISTRE',
         'TAUX_CHAMBRE',
         'TAUX_TVA',
         'TAUX_REPAS',
         'TAUX_PRODUIT',
         'CODE_MONNAIE',
         'CODE_AGENCE_ACTUEL',
         'DATE_CREATION',
         'LOGO'
    ];

    protected $table = "societe";
}
