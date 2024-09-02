<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certif; // Pastikan model Education sudah diimpor
use App\Models\Profile;   // Pastikan model Profile sudah diimpor
use Illuminate\Support\Facades\Storage;


class CertifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificate = Certif::all();
        return view('admin.certificate.index', compact('certificate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profile = Profile::all();
        return view('admin.certificate.create', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
             $request->validate([
            'id_profile' => 'nullable|integer',
            'nama_sertifikat' => 'nullable|string',
            'tahun_sertifikat' => 'nullable|date',
            'deskripsi' => 'nullable|string',
            'bukti_sertifikat' => 'nullable|string|mimes:pdf',
        ]);
        // dd();
        if ($request->hasFile('bukti_sertifikat')) {
            $document = $request->file('bukti_sertifikat');
            $path = $document->store('public/doc');
            $name = basename($path); //menyimpan nama filenya saja
        }
        // Insert into profiles()values():
        Certif::create([
            'id_profile' => $request->id_profile,
            'nama_sertifikat' => $request->nama_sertifikat,
            'tahun_sertifikat' => $request->tahun_sertifikat,
            'deskripsi' => $request->deskripsi,
            'bukti_sertifikat' => $request->bukti_sertifikat,
        ]);

        return redirect()->route('certificate.index')->with('success', 'Data berhasil ditambahkan');
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
        $certificate = Certif::findOrFail($id); // Mengambil data pendidikan berdasarkan ID
        return view('admin.certificate.edit', compact('certificate')); // Mengirim data ke view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $certificate = Certif::findOrFail($id);
        $request->validate([
            'id_profile' => 'nullable|integer',
            'nama_sertifikat' => 'nullable|string',
            'tahun_sertifikat' => 'nullable|date',
            'deskripsi' => 'nullable|string',
            'bukti_sertifikat' => 'nullable|document|mimes:pdf',

        ]);
        //simpan dokumen jika ada di upload
        if ($request->hasFile('bukti_sertifikat')) {
            //hapus dokumen lama jika ada
            if ($certificate->bukti_sertifikat) {
                Storage::delete('public/doc/' . $certificate->picture);
            }
            $image = $request->file('picture');
            $path = $image->storage('public/image');
            $name = basename($path);
            $certificate->bukti_sertifikat = $name;
        }

        $certificate->id_profile = $request->id_profile;
        $certificate->nama_sertifikat = $request->nama_sertifikat;
        $certificate->tahun_sertifikat = $request->tahun_sertifikat;
        $certificate->deskripsi = $request->deskripsi;
        $certificate->bukti_sertifikat = $request->bukti_sertifikat;
        $certificate->save();

        return redirect()->route('certificate.index')->with('success', 'Update Profile Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
