<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
     /**
     * Write code on Method
     * 

     * @return response()
     */
    public function stock()
    {
        $stock =DB::table("stock")
        ->select(DB::raw('name AS Produit, quantity as Stock'))
        ->orderBy('Produit')
        ->groupBy(DB::raw('Stock , Produit'))
        ->get();
        
        $labels = [];
        $data = [];

        //$values = $stock->values()->toArray();
        foreach($stock as $s){
            $data [] = $s->Stock;
            $labels [] = $s->Produit;
        }
              
        
        return view('backend.chart.stock')->with('labels',$labels)->with('data',$data);
    }

    public function orders()
    {
        $login =DB::table("orders")
        ->select(DB::raw('product_id AS Commande, SUM(qunatity) as Qunatité'))
        ->orderBy('Commande')
        ->groupBy(DB::raw('Commande'))
        ->get();
   

 
        $labels = [];
        $data = [];

        $values = $login->values()->toArray();
        foreach($values as $value){
            $data [] = $value->Qunatité;
            $labels [] = $value->Commande;
        }
              
        return view('backend.chart.Commande', compact('labels', 'data'));
    }
}
