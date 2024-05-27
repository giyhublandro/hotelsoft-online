<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use Illuminate\Http\Request;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Societe::all(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $societe = $request->validate([
             
            'CODE_SOCIETE'=>'required',
            'RAISON_SOCIALE'=>'required',
            'VILLE'=>'required',
            'BOITE_POSTALE'=>'required',
            'PAYS'=>'required',
            'TELEPHONE'=>'required',
            'FAX'=>'required',
            'EMAIL'=>'required',
            'RUE'=>'required',
            'NUM_CONTRIBUABLE'=>'required',
            'NUM_REGISTRE'=>'required',
            'TAUX_CHAMBRE'=>'required',
            'TAUX_TVA'=>'required',
            'TAUX_REPAS'=>'required',
            'TAUX_PRODUIT'=>'required',
            'CODE_MONNAIE'=>'required',
            'CODE_AGENCE_ACTUEL'=>'required',
            'DATE_CREATION'=>'required',
            'LOGO'=>'required'

        ]);

        return Societe::create($societe);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Societe::find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Societe::where('ID_SOCIETE', $id)->exists()){

            $societe = Societe::find($id);

            $societe->CODE_SOCIETE = $request->CODE_SOCIETE;
            $societe->RAISON_SOCIALE= $request->RAISON_SOCIALE;
            $societe->VILLE = $request->VILLE;
            $societe->BOITE_POSTALE =  $request->BOITE_POSTALE;
            $societe->PAYS = $request->PAYS;
            $societe->TELEPHONE = $request->TELEPHONE;
            $societe->FAX = $request->FAX;
            $societe->EMAIL = $request->EMAIL;
            $societe->RUE = $request->RUE;
            $societe->NUM_CONTRIBUABLE = $request->NUM_CONTRIBUABLE;
            $societe->NUM_REGISTRE = $request->NUM_REGISTRE;
            $societe->TAUX_CHAMBRE = $request->TAUX_CHAMBRE;
            $societe->TAUX_TVA = $request->TAUX_TVA;
            $societe->TAUX_REPAS = $request->TAUX_REPAS;
            $societe->TAUX_PRODUIT = $request->TAUX_PRODUIT;
            $societe->CODE_MONNAIE = $request->CODE_MONNAIE;
            $societe->CODE_AGENCE_ACTUEL = $request->CODE_AGENCE_ACTUEL;
            $societe->DATE_CREATION = $request->DATE_CREATION;
            $societe->LOGO = $request->LOGO;
            
            $societe->save();

            return response()->json([
                "message" => "record updated successfully"
            ],200);

        }else{
            return response()->json([
                "message" => "Societe not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if(Societe::where('ID_SOCIETE', $id)->exists()){

            $societe = Societe::find($id);
            $societe->delete();

            return response()->json([
                "message" => "Record deleted successfully"
            ],200);
            
        }else{
            
            return response()->json([
                "message" => "Societe not found"
            ], 404);

        }

    }
}
