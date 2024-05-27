<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SocieteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'ID_SOCIETE' => $this->ID_SOCIETE,
            'CODE_SOCIETE' => $this->CODE_SOCIETE,
            'RAISON_SOCIALE' => $this->RAISON_SOCIALE,
             'VILLE' => $this->VILLE,
             'BOITE_POSTALE' => $this->BOITE_POSTALE,
             'PAYS' => $this->PAYS,
             'TELEPHONE' => $this->TELEPHONE,
             'FAX' => $this->FAX,
             'EMAIL' => $this->EMAIL,
             'RUE' => $this->RUE,
             'NUM_CONTRIBUABLE' => $this->NUM_CONTRIBUABLE,
             'NUM_REGISTRE' => $this->NUM_REGISTRE,
             'TAUX_CHAMBRE' => $this->TAUX_CHAMBRE,
             'TAUX_TVA' => $this->TAUX_TVA,
             'TAUX_REPAS' => $this->TAUX_REPAS,
             'TAUX_PRODUIT' => $this->TAUX_PRODUIT,
             'CODE_MONNAIE' => $this->CODE_MONNAIE,
             'CODE_AGENCE_ACTUEL' => $this->CODE_AGENCE_ACTUEL,
             'DATE_CREATION' => $this->DATE_CREATION,
             'LOGO' => $this->LOGO

        ];
        
    }
}
