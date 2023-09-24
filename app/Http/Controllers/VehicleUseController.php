<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleUse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\VehicleUseRequest;
use Yajra\DataTables\Facades\DataTables;

class VehicleUseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = VehicleUse::with(['vehicle.categories','user']);
    
            return DataTables::of($query)
                ->addColumn('action', function($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                            type="button" data-bs-toggle="dropdown"
                            > Aksi
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" 
                                href="'. route('vehicleUse.edit', $item->id) .'"
                                > Sunting </a>
                                <form action="'. route('vehicleUse.destroy', $item->id) .'" 
                                method="POST">
                                    '. method_field('delete') . csrf_field() .'
                                    <button type="submit" 
                                        class="dropdown-item text-danger">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })->rawColumns(['action'])->make();
        }

        return view('pages.vehicleUse.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::with(['categories'])->get();
        $user = [];
        if(Auth::user()->roles == 'ADMIN'){
            $user = User::all();
        }
        return view('pages.vehicleUse.create', [
            'vehicles' => $vehicles,
            'users' => $user
        ]);
    }

    public function createWithId(Request $request, $id)
    {
        $vehicles = Vehicle::with(['categories'])->get();
        $user = [];
        if(Auth::user()->roles == 'ADMIN'){
            $user = User::all();
        }
        return view('pages.vehicleUse.create', [
            'vehicles' => $vehicles,
            'users' => $user,
            'vehicles_id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleUseRequest $request)
    {
        $data = $request->all();

        VehicleUse::create($data);

        return redirect()->route('vehicleUse.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicles = Vehicle::all();
        $vehicleUse = VehicleUse::with(['vehicle', 'user'])->findOrFail($id);
        $user = [];

        if(Auth::user()->roles == 'ADMIN'){
            $user = User::all();
        }

        return view('pages.vehicleUse.edit', [
            'vehicleUse' => $vehicleUse,
            'vehicles' => $vehicles,
            'users' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleUseRequest $request, string $id)
    {
        $data = $request->all();
        $item = VehicleUse::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('vehicleUse.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = VehicleUse::findOrFail($id);

        $item->delete();
     
        return redirect()->route('vehicleUse.index');
    }
}
