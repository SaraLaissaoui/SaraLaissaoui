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
    //
    public function index(){
        return view('cashier.index');
    }
}
