<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Profile;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skill = Skill::all();
        return view('admin.skill.index', compact('skill'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profiles = Profile::all(); // Menggunakan plural untuk menyiratkan koleksi
        return view('admin.skill.create', compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_profile' => 'nullable|integer',
            'nama_skill' => 'nullable|string',
            'sub_judul' => 'nullable|string',
            'descriptions' => 'nullable|string',

        ]);

        // Menyimpan data ke dalam database
        Skill::create([
            'id_profile' => $request->id_profile,
            'nama_skill' => $request->nama_skill,
            'sub_judul' => $request->sub_judul,
            'descriptions' => $request->descriptions,
        ]);

        return redirect()->route('skill.index')->with('success', 'Data berhasil ditambahkan');
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
        $skill = Skill::findOrFail($id);
        $profiles = Profile::all(); // Menggunakan plural untuk menyiratkan koleksi
        return view('admin.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $skill = Skill::findOrFail($id);
        $request->validate([
            'id_profile' => 'nullable|integer',
            'nama_skill' => 'nullable|string',
            'sub_judul' => 'nullable|string',
            'descriptions' => 'nullable|string',

        ]);
        $skill->id_profile = $request->id_profile;
        $skill->nama_skill = $request->nama_skill;
        $skill->sub_judul = $request->sub_judul;
        $skill->descriptions = $request->descriptions;
        $skill->save();
        return redirect()->route('skill.index')->with('success', 'Update skill Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::withTrashed()->findOrFail($id);
        $skill->forceDelete();
        return redirect()->route('skill.index')->with('success', 'Data Berhasil Dihapus Permanen');
    }

    public function softdelete(string $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return redirect()->route('skill.index')->with('success', 'Data Berhasil Dihapus Sementara');
    }
    public function recycle()
    {
        $skill = Skill::onlyTrashed()->paginate(15);
        return view('admin.skill.recycle', compact('skill'));
    }
    // public function restore($id)
    // {
    //     $experience = Experience::withTrashed()->findOrFail($id);
    //     $experience->restore();
    //     return redirect()->route('experience.index')->with('success', 'Data Berhasil di restore');
    // }
    public function balikinData($id)
    {
        $profile = Skill::withTrashed()->findOrFaild($id);
        $profile->restore();
        return redirect()->route('skill.index')->with('success', 'Data Berhasil dikembalikan');
    }
}
