<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category.tambah');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => ['required', 'max:255', 'min:5'],
            'description' => ['required'],
        ], [
            'required' => 'Inputan :attribute harus diisi.',
            'max' => 'Inputan :attribute maksimal :max karakter.',
            'min' => 'Inputan :attribute minimal :min karakter.',
        ]);

        $now = Carbon::now();          

        // Insert Data
        DB::table('categories')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Tampil Semua Category
        return redirect('/category')->with('success', 'Berhasil Tambah Genre!');
    }

    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('category.tampil', ['categories' => $categories]);
    }

    public function show($id)
    {
        $category = DB::table('categories')->find($id);
        return view('category.detail', ['category' => $category]);
    }

    public function edit($id)
    {
        $category = DB::table('categories')->find($id);
        return view('category.edit', ['category' => $category]);
    }

    public function update($id, Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => ['required', 'max:255', 'min:5'],
            'description' => ['required'],
        ], [
            'required' => 'Inputan :attribute harus diisi.',
            'max' => 'Inputan :attribute maksimal :max karakter.',
            'min' => 'Inputan :attribute minimal :min karakter.',
        ]);

        $now = Carbon::now();          

        // Update Data
        DB::table('categories')->where('id', $id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'updated_at' => $now,
        ]);

        // Tampil Semua Category
        return redirect('/category')->with('success', 'Berhasil Update Genre!');
    }

    public function destroy($id)
    {
        // Hapus Data
        DB::table('categories')->where('id', $id)->delete();

        // Tampil Semua Category
        return redirect('/category')->with('success', 'Berhasil Hapus Genre!');
    }
}