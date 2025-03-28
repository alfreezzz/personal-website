<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
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
        return view('admin.portofolio.create', ['title' => 'Add Finished Project']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'img' => 'required|image|mimes:jpeg,png,jpg',
                'nama_apk' => 'required|string',
                'jenis_apk' => 'required|string',
                'tgl_selesai' => 'required|date',
                'deskripsi' => 'required|string',
                'url' => 'nullable',
                'bahasa' => 'required|array',
            ],
            [
                'img.required' => 'Please upload an image',
                'img.image' => 'File must be an image',
                'img.mimes' => 'Only jpeg, png, and jpg files are allowed',
                'nama_apk.required' => 'The name of the application is required',
                'jenis_apk.required' => 'The type of application is required',
                'tgl_selesai.required' => 'The completion date is required',
                'deskripsi.required' => 'The description is required',
                'bahasa.required' => 'The language is required',
            ]
        );

        $portofolio = new Portofolio();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $path = $file->store('images/portofolios', 'public');
            $portofolio->img = $path;
        }

        $portofolio->nama_apk = $request->nama_apk;
        $portofolio->jenis_apk = $request->jenis_apk;
        $portofolio->tgl_selesai = $request->tgl_selesai;
        $portofolio->deskripsi = $request->deskripsi;
        $portofolio->url = $request->url;
        $portofolio->bahasa = json_encode($request->input('bahasa'));

        $portofolio->save();

        return redirect('?token=' . $request->input('token') . '#project')->with('success', 'Project added successfully');
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
        $projects = Portofolio::findOrFail($id);
        return view('admin.portofolio.edit', compact('projects'), ['title' => 'Edit Project']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'img' => 'image|mimes:jpeg,png,jpg,gif',
            'nama_apk' => 'required|string',
            'tgl_selesai' => 'required|date',
            'jenis_apk' => 'required|string',
            'deskripsi' => 'required|string',
            'bahasa' => 'required|array', // Pastikan ini adalah array
        ]);

        $portofolio = Portofolio::findOrFail($id);

        if ($request->hasFile('img')) {
            // Hapus gambar lama jika ada
            if ($portofolio->img && file_exists(public_path('storage/' . $portofolio->img))) {
                unlink(public_path('storage/' . $portofolio->img));
            }
            $filePath = $request->file('img')->store('images', 'public');
            $portofolio->img = $filePath;
        }

        // Pastikan bahasa disimpan sebagai array (gunakan json_encode)
        $portofolio->update([
            'nama_apk' => $request->nama_apk,
            'tgl_selesai' => $request->tgl_selesai,
            'jenis_apk' => $request->jenis_apk,
            'deskripsi' => $request->deskripsi,
            'url' => $request->url,
            'bahasa' => json_encode($request->bahasa), // Pastikan ini adalah format JSON
        ]);

        return redirect('?token=' . $request->input('token') . '#project')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        Portofolio::destroy($id);
        return redirect('?token=' . $request->input('token') . '#project')->with('success', 'Project removed successfully');
    }
}
