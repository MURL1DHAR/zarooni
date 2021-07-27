<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Route;

use DB;
use Illuminate\Support\Collection;

class SalesController extends Controller
{
    public function __construct()
    {
        
    }

    public function index() {

        $sales_transactions = Route::with('transactions')->get();
        $sales = Route::select('id', 'id AS route_id', 'route_name', 'route_no')->get();
        

        foreach($sales_transactions as $key => $sale) {

            $total = 0;
            foreach($sale->transactions as $key => $value) {
                
                $total += $value->total_amount;
            }

            $x = new \stdClass();
            $x->total_amount = $total;
            $x->total_hour = [];
            $sales[$key]['sales_summary'] = $x;
        }

        $response = [
            'salesman' => $sales
        ];
        return response()->json(['data' => $response]);
    }
}
