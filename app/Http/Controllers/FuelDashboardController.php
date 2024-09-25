<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FuelDashboardController extends Controller
{

    public function barCharts()
    {
       
        $fuelData = DB::select("SELECT ucg_station_id, SUM(regular_qty) AS total_regular, SUM(super_qty) AS total_super, SUM(diesel_qty) AS total_diesel FROM fuel_datas GROUP BY ucg_station_id");

        $invoiceData = DB::select("SELECT ucg_station_id, SUM(total_invoice) AS total_invoice FROM fuel_datas GROUP BY ucg_station_id");
        
        $fuelComparsion = DB::select("SELECT AVG(regular_rate) AS avg_regular_rate, AVG(super_rate) AS avg_super_rate, AVG(diesel_rate) AS avg_diesel_rate FROM fuel_datas ");
    
        return view('fuel_quantity', compact('fuelData', 'invoiceData','fuelComparsion'));
    }

    public function lineCharts(){

        $trendsOverTime = DB::select("SELECT day_date, 
               SUM(regular_qty) AS total_regular, 
               SUM(super_qty) AS total_super, 
               SUM(diesel_qty) AS total_diesel, 
               SUM(total_invoice) AS total_invoice
        FROM fuel_datas 
        GROUP BY day_date 
        ORDER BY day_date ASC
    ");

        $priceTrends = DB::select("SELECT day_date, 
               AVG(regular_rate) AS avg_regular_rate, 
               AVG(super_rate) AS avg_super_rate, 
               AVG(diesel_rate) AS avg_diesel_rate
        FROM fuel_datas 
        GROUP BY day_date 
        ORDER BY day_date ASC
    ");
        return view('line_charts',compact('trendsOverTime','priceTrends'));
    }

    public function pieCharts(){

        $invoiceData = DB::select(" SELECT ucg_station_id, SUM(total_invoice) AS total_invoice
        FROM fuel_datas GROUP BY ucg_station_id
    ");

        $fuelType = DB::select(" SELECT SUM(regular_qty) AS regular, SUM(super_qty) AS super, SUM(diesel_qty) AS diesel
        FROM fuel_datas");

    return view('pie_charts', compact('invoiceData','fuelType'));

    }
}

