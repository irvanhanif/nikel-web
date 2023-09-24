<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VehicleCategory;
use Yajra\DataTables\Facades\DataTables;

class VehicleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = VehicleCategory::query();
    
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
                                href="'. route('category.edit', $item->id) .'"
                                > Sunting </a>
                                <form action="'. route('category.destroy', $item->id) .'" 
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

        return view('pages.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        VehicleCategory::create($data);

        return redirect()->route('category.index');
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
        $category = VehicleCategory::findOrFail($id);
        return view('pages.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $item = VehicleCategory::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = VehicleCategory::findOrFail($id);

        $item->delete();
     
        return redirect()->route('category.index');
    }
}
