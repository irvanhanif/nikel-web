<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Vehicle::with(['categories']);
    
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
                                href="'. route('vehicles.edit', $item->id) .'"
                                > Sunting </a>
                                <form action="'. route('vehicles.destroy', $item->id) .'" 
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

        return view('pages.vehicle.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = VehicleCategory::all();
        return view('pages.vehicle.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        Vehicle::create($data);

        return redirect()->route('vehicles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Vehicle::with(['categories'])->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicle = Vehicle::with(['categories'])->findOrFail($id);
        $category = VehicleCategory::all();
        return view('pages.vehicle.edit', [
            'vehicle' => $vehicle,
            'categories' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleRequest $request, string $id)
    {
        $data = $request->all();
        $item = Vehicle::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Vehicle::findOrFail($id);

        $item->delete();
     
        return redirect()->route('vehicles.index');
    }
}
