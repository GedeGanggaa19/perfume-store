<?php

namespace App\Http\Controllers;

use App\Models\Perfume;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $categoryId = $request->input('category_id');

        $perfumes = new Perfume;

        if ($keyword) {
            $perfumes = $perfumes->where('name', 'like', "%{$keyword}%");
        }

        if ($categoryId) {
            $perfumes = $perfumes->where('category_id', $categoryId);
        }


        $perfumes = $perfumes->orderBy('id', 'desc')->paginate(5);

        return response()->json($perfumes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|url',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ], [
            'name.required' => 'Nama perfume wajib diisi.',
            'image.required' => 'Image perfume wajib diisi.',
            'category.required' => 'Nama category wajib diisi.',
            'brand.required' => 'Nama brand wajib diisi.',
            'price.required' => 'Harga perfume wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'stock.required' => 'Stok perfume wajib diisi.',
            'stock.integer' => 'Stok harus berupa bilangan bulat.',
        ]);

        $perfumes = Perfume::create($validatedData);
        return response()->json([
            'message' => 'Perfume berhasil ditambahkan',
            'product' => $perfumes
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perfumes = Perfume::findOrFail($id);
        return response()->json($perfumes);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $perfumes = Perfume::findOrFail($id);
        $perfumes->update($request->all());
        return response()->json(['message' => 'Perfume berhasil diupdate'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perfumes = Perfume::findOrFail($id);
        $perfumes->delete();

        return response()->json(['message' => 'Perfume berhasil dihapus'], 200);
    }
}
