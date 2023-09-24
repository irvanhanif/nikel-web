<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = User::all();
    
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
                                href="'. route('user.edit', $item->id) .'"
                                > Sunting </a>
                                <form action="'. route('user.destroy', $item->id) .'" 
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

        return view('pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
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
        $user = User::findOrFail($id);
        return view('pages.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $data = $request->all();
        $item = User::findOrFail($id);

        $item->update($data);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::findOrFail($id);

        $item->delete();
     
        return redirect()->route('user.index');
    }

}
