<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Skill;
use App\Models\Profile;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Awards;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $profile = Profile::where('status', 1)->first();
        $id = $profile->id;

        $experience = Experience::where('id_profile', $id)->get();
        $education = Education::where('id_profile', $id)->get();
        $skill = Skill::where('id_profile', $id)->get();
        $language = Language::where('id_profile', $id)->get();
        $awards = Awards::where('id_profile', $id)->get();

        return view('layouts_3.index', compact('profile', 'experience', 'education', 'skill', 'language', 'awards'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
