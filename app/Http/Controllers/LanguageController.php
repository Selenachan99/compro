<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language; // Pastikan model Education sudah diimpor
use App\Models\Profile;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $language = Language::all();
        return view('admin.language.index', compact('language'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profile = Profile::all();
        // $id = $profile->id;

        // $language = Language::where('id_profile', $id)->get();
        return view('admin.language.create', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_profile' => 'nullable|integer',
            'nama_bahasa' => 'nullable|string',
            'tingkat_bahasa' => 'nullable|string',
            'deskripsi' => 'nullable|string',

        ]);

        // Menyimpan data ke dalam database
        Language::create([
            'id_profile' => $request->id_profile,
            'nama_bahasa' => $request->nama_bahasa,
            'tingkat_bahasa' => $request->tingkat_bahasa,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('language.index')->with('success', 'Data berhasil ditambahkan');
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
        $language = Language::findOrFail($id); // Mengambil data pendidikan berdasarkan ID
            return view('admin.language.edit', compact('language')); // Mengirim data ke view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $language = Language::findOrFail($id);
        $request->validate([
            'id_profile' => 'nullable|integer',
            'nama_bahasa' => 'nullable|string',
            'tingkat_bahasa' => 'nullable|string',
            'deskripsi' => 'nullable|string',

        ]);
        $language->id_profile = $request->id_profile;
        $language->nama_bahasa = $request->nama_bahasa;
        $language->tingkat_bahasa = $request->tingkat_bahasa;
        $language->deskripsi = $request->deskripsi;
        $language->save();
        return redirect()->route('language.index')->with('success', 'Update Experience Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $language = Language::withTrashed()->findOrFail($id);
        $language->forceDelete();
        return redirect()->route('language.index')->with('success', 'Data Berhasil Dihapus Permanen');
    }
    public function softdelete(string $id)
    {
        $language = Language::findOrFail($id);
        $language->delete();
        return redirect()->route('language.index')->with('success', 'Data Berhasil Dihapus Sementara');
    }
    public function recycle()
    {
        $language = Language::onlyTrashed()->paginate(15);
        return view('admin.language.recycle', compact('language'));
    }
    // public function restore($id)
    // {
    //     $language = Language::withTrashed()->findOrFail($id);
    //     $language->restore();
    //     return redirect()->route('language.index')->with('success', 'Data Berhasil di restore');
    // }
    public function balikinData($id)
    {
        $profile = language::withTrashed()->findOrFaild($id);
        $profile->restore();
        return redirect()->route('language.index')->with('success', 'Data Berhasil dikembalikan');
    }
}
