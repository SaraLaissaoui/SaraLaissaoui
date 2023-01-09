<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Table;
use App\Models\Category;
use App\Models\Food;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    // 1st page cashier
    public function index(){
        $categories = Category::all();
        return view('cashier.index')->with('categories',$categories);
    }

    // Get all the tables
    public function getTables(){
        $tables =  Table::all();
        $html='';
        foreach($tables as $table){
            $html .= '<div class="col-md-2 mb-4">';
            if($table->status == "available"){
                $html .= '<button class="btn btn-outline-success btn-table" data-id="'.$table->id.'" data-name="'.$table->name.'">';
            }else{
                $html .= '<button class="btn btn-outline-danger btn-table" data-id="'.$table->id.'" data-name="'.$table->name.'">';

            }

            $html .= '<img class="img-fluid" src="'.$table->image.'"/>';
            $html .= '<br>';
            if($table->status == "available"){
                $html .= '<span class="badge bg-success">'.$table->name.'</span>';
            }else{
                $html .= '<span class="badge bg-danger">'.$table->name.'</span>';
            }
            $html .= '</button>';
            $html .= '</div>';
        }
        return $html;
    }
}
