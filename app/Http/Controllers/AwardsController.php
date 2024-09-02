<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Awards; // Pastikan model Education sudah diimpor
use App\Models\Profile;

class AwardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $awards = Awards::all();
        return view('admin.awards.index', compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profile = Profile::all();
        return view('admin.awards.create', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_profile' => 'nullable|integer',
            'nama_penghargaan' => 'nullable|string',
            'tahun_penghargaan' => 'nullable|date',
            'deskripsi' => 'nullable|string',
        ]);
        Awards::create([
            'id_profile' => $request->id_profile,
            'nama_penghargaan' => $request->nama_penghargaan,
            'tahun_penghargaan' => $request->tahun_penghargaan,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('awards.index')->with('success', 'Data berhasil ditambah');
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
        $awards = Awards::findOrFail($id); // Mengambil data pendidikan berdasarkan ID
            return view('admin.awards.edit', compact('awards')); // Mengirim data ke view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $awards = Awards::findOrFail($id);
        $request->validate([
            'id_profile' => 'nullable|integer',
            'nama_penghargaan' => 'nullable|string',
            'tahun_penghargaan' => 'nullable|date',
            'deskripsi' => 'nullable|string',

        ]);
        $awards->id_profile = $request->id_profile;
        $awards->nama_penghargaan = $request->nama_penghargaan;
        $awards->tahun_penghargaan = $request->tahun_penghargaan;
        $awards->deskripsi = $request->deskripsi;
        $awards->save();
        return redirect()->route('awards.edit')->with('success', 'Update awards Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $awards = Awards::withTrashed()->findOrFail($id);
        $awards->forceDelete();
        return redirect()->route('awards.index')->with('success', 'Data Berhasil Dihapus Permanen');
    }

    public function SoftDelete(string $id)
    {
        $awards = Awards::findOrFail($id);
        $awards->delete();
        return redirect()->route('awards.index')->with('success', 'Data Berhasil Dihapus Sementara');
    }

    public function BalikData(string $id)
    {
        $awards = Awards::withTrashed()->findOrFail($id);
        $awards->restore();
        return redirect()->route('awards.index')->with('success', 'Data Berhasil di restore');

    }

    public function Recycle()
    {
        $awards = Awards::onlyTrashed()->paginate(15);
        return view('admin.awards.recycle', compact('awards'));
    }
}
