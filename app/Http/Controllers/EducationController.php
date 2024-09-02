<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education; // Pastikan model Education sudah diimpor
use App\Models\Profile;   // Pastikan model Profile sudah diimpor

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $education = Education::all();
        return view('admin.education.index', compact('education'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function recycle()
    {
        $education = Education::onlyTrashed()->paginate(15);
        return view('admin.education.recycle', compact(['education']));
    }
    public function create()
    {
        $profiles = Profile::all(); // Menggunakan plural untuk menyiratkan koleksi
        return view('admin.education.create', compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_profile' => 'nullable|integer',
            'nama_sekolah' => 'nullable|string',
            'jurusan' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'riwayat_pendidikan' => 'nullable|string',

        ]);

        // Menyimpan data ke dalam database
        Education::create([
            'id_profile' => $request->id_profile,
            'nama_sekolah' => $request->nama_sekolah,
            'jurusan' => $request->jurusan,
            'deskripsi' => $request->deskripsi,
            'riwayat_pendidikan' => $request->riwayat_pendidikan,
        ]);

        return redirect()->route('education.index')->with('success', 'Data berhasil ditambahkan');
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
            $education = Education::findOrFail($id); // Mengambil data pendidikan berdasarkan ID
            return view('admin.education.edit', compact('education')); // Mengirim data ke view
        }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $education = Education::findOrFail($id);
        $request->validate([
            'id_profile' => 'nullable|integer',
            'nama_sekolah' => 'nullable|string',
            'jurusan' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'riwayat_pendidikan' => 'nullable|date',

        ]);
        $education->id_profile = $request->id_profile;
        $education->nama_sekolah = $request->nama_sekolah;
        $education->jurusan = $request->jurusan;
        $education->deskripsi = $request->deskripsi;
        $education->riwayat_pendidikan = $request->riwayat_pendidikan;
        $education->save();
        return redirect()->route('education.edit')->with('success', 'Update education Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->route('education.index')->with('success', 'Data berhasil dihapus.');
    }
}
