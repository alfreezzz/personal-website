<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
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
        return view('admin.experience.create', ['title' => 'Add New Experience']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'thn_mulai' => 'required',
                'thn_selesai' => 'nullable',
                'nama_perusahaan' => 'required',
                'posisi' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'thn_mulai.required' => 'Starting date is required',
                'nama_perusahaan.required' => 'Company name is required',
                'posisi.required' => 'Position is required',
                'deskripsi.required' => 'Description is required',
            ]
        );

        $experience = new Experience();

        $experience->thn_mulai = $request->thn_mulai;
        $experience->thn_selesai = $request->thn_selesai;
        $experience->nama_perusahaan = $request->nama_perusahaan;
        $experience->posisi = $request->posisi;
        $experience->deskripsi = $request->deskripsi;

        $experience->save();

        return redirect('?token=' . $request->input('token') . '#experience')->with('success', 'Experience added successfully');
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
        $experience = Experience::findOrFail($id);
        return view('admin.experience.edit', ['title' => 'Revise Experience', 'experience' => $experience,]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'thn_mulai' => 'required',
                'thn_selesai' => 'nullable',
                'nama_perusahaan' => 'required',
                'posisi' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'thn_mulai.required' => 'Starting date is required',
                'nama_perusahaan.required' => 'Company name is required',
                'posisi.required' => 'Position is required',
                'deskripsi.required' => 'Description is required',
            ]
        );

        $experience = Experience::findOrFail($id);

        $experience->thn_mulai = $request->thn_mulai;
        $experience->thn_selesai = $request->thn_selesai;
        $experience->nama_perusahaan = $request->nama_perusahaan;
        $experience->posisi = $request->posisi;
        $experience->deskripsi = $request->deskripsi;

        $experience->save();

        return redirect('?token=' . $request->input('token') . '#experience')->with('success', 'Experience updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        Experience::destroy($id);
        return redirect('?token=' . $request->input('token') . '#experience')->with('success', 'Experience deleted successfully');
    }
}
