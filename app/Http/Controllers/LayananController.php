<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::get();
        return view('dashboard.layanan.index', [
            'layanan' => $layanan
        ]);
    }
    public function create()
    {
        return view('dashboard.layanan.create');
    }
    public function edit($id)
    {
        $layanan = Layanan::find($id);
        return view(
            'dashboard.layanan.edit',
            [
                'layanan' => $layanan
            ]
        );
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required',
            'harga' => 'required',
            'status' => 'required'
        ]);
        $item = Layanan::find($request->id);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/uploads');
        } else {
            $imagePath = $item->image;
        }

        Layanan::updateOrCreate(['id' => $request->id],
            [
                'nama' => $validatedData['nama'],
                'image' => $imagePath,
                'harga' => $validatedData['harga'],
                'deskripsi' => $validatedData['deskripsi'],
                'status' => $validatedData['status'],
            ]
        );

        if ($request->id) {
            return redirect()->route('layanan')->with('success', 'Berhasil Memperbarui Layanan!');
        } else {
            return redirect()->route('layanan')->with('success', 'Berhasil Menambahkan Layanan!');
        }
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nama' => 'required',
    //         'image'=>'mimes:jpg,png,jpeg|image|max:2048|required',
    //         'deskripsi' => 'required',
    //         'harga' => 'required',
    //         'status' => 'required'
    //     ]);
    //     $layanan = Layanan::find($request->id);
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('public/uploads');
    //     } else {
    //         $imagePath = $layanan->image;
    //     }
    //     Layanan::updateOrCreate(
    //         [
    //             'id' => $request->id
    //         ],
    //         [
    //             'nama' => $validatedData['nama'],
    //             'image' => $imagePath,
    //             'harga' => $validatedData['harga'],
    //             'deskripsi' => $validatedData['deskripsi'],
    //             'status' => $validatedData['status'],
    //         ]
    //     );
    //     if ($request->id) {
    //         return redirect()->route('layanan')->with('success', 'Success Update Layanan!');
    //     } else {
    //         return redirect()->route('layanan')->with('success', 'Success Menambah Layanan!');
    //     }
    // }


    public function destroy($id)
    {
        $layanan = Layanan::find($id);
        $layanan->delete();
        return redirect()->route('layanan')->with('success', 'Success Delete Layanan!');
    }
}
