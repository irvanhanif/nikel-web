<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleUse;
use Illuminate\Http\Request;
use App\Models\VehicleCategory;
use App\Charts\VehicleUsedChart;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = VehicleCategory::all();
        $vehicles = Vehicle::with(['categories'])->get();

        $data = $request->all();
        if(count($data) > 1) {
            if($data["name"] != null || $data['categories_id'] > 0) {
                $vehicles = Vehicle::with(['categories'])->where('category', $data['categories_id'])->orWhere('name', 'like', '%'. $data['name'] .'%')->get();
                return view('welcome', [
                    'categories' => $categories,
                    'vehicles' => $vehicles
                ]);
            }
        }

        return view('welcome', [
            'categories' => $categories,
            'vehicles' => $vehicles
        ]);
    }

    public function home()
    {
        $vehicleUse = VehicleUse::selectRaw('monthname(created_at) month, count(*) data')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->get();

        $month = [];
        $total = [];
        for ($i=0; $i < count($vehicleUse); $i++) { 
            array_push($month, $vehicleUse[$i]->month);
            array_push($total, $vehicleUse[$i]->data);
        }
        return view('dashboard', [
            'month'=>$month,
            'vehicleUse' => $total
        ]);
    }
}
