<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill.create', ['title' => 'Add New Skill']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'bahasa' => 'required',
                'warna' => 'required|max:6|min:6',
                'persen' => 'required|numeric|max:100|min:1',
            ],
            [
                'bahasa.required' => 'Programming Language is required',
                'warna.required' => 'Color is required',
                'warna.max' => 'Color must be 6 characters',
                'warna.min' => 'Color must be 6 characters',
                'persen.required' => 'Percentage is required',
                'persen.max' => 'Percentage must be less than 101',
                'persen.min' => 'Percentage must be more than 0',
            ]
        );

        $skill = new Skill();
        $skill->bahasa = $request->bahasa;
        $skill->warna = $request->warna;
        $skill->persen = $request->persen;
        $skill->save();

        return redirect('/#about')->with('success', 'Skill added successfully');
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
        return view('admin.skill.edit', ['title' => 'Update ' . $skill->bahasa . ' Skill', 'skill' => $skill]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'bahasa' => 'required',
                'warna' => 'required|max:6|min:6',
                'persen' => 'required|numeric|max:100|min:1',
            ],
            [
                'bahasa.required' => 'Programming Language is required',
                'warna.max' => 'Color must be 6 characters',
                'warna.min' => 'Color must be 6 characters',
                'persen.required' => 'Percentage is required',
                'persen.max' => 'Percentage must be less than 101',
                'persen.min' => 'Percentage must be more than 0',
            ]
        );

        $skill = Skill::findOrFail($id);
        $skill->bahasa = $request->bahasa;
        $skill->warna = $request->warna;
        $skill->persen = $request->persen;
        $skill->save();

        return redirect('/#about')->with('success', 'Skill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Skill::destroy($id);
        return redirect('/#about')->with('success', 'Skill deleted successfully');
    }
}
