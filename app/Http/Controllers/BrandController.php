<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
        $keyword = $request->input('keyword');

        $brands = new Brand;

        if ($keyword) {
            $brands = $brands->where('name', 'like', "%{$keyword}%");
        }

        $brands = $brands->orderBy('id', 'asc')->paginate(3);

        return response()->json($brands);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Nama brand wajib diisi.',
        ]);

        $brands = Brand::create($validatedData);
        return response()->json([
            'message' => 'Brand berhasil ditambahkan',
            'brand' => $brands
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $brands = Brand::findOrFail($id);
        return response()->json($brands);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brands = Brand::findOrFail($id);
        $brands->update($request->all());
        return response()->json(['message' => 'Brand berhasil diupdate'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $brands = Brand::findOrFail($id);
        $brands->delete();

        return response()->json(['message' => 'Brand berhasil dihapus'], 200);
    }
}
