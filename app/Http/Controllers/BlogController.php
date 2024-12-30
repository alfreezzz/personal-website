<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
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
        return view('admin.blog.create', ['title' => 'Create Blog']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'img' => 'required|image|mimes:jpeg,png,jpg',
                'judul_artikel' => 'required',
                'isi_artikel' => 'required',
                'jenis_artikel' => 'required',
            ],
            [
                'img.required' => 'Please upload an image',
                'img.image' => 'File must be an image',
                'img.mimes' => 'Only jpeg, png, and jpg files are allowed',
                'judul_artikel.required' => 'Article title is required',
                'isi_artikel.required' => 'Article content is required',
                'jenis_artikel.required' => 'Article type is required',
            ]
        );

        $blog = new Blog();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $path = $file->store('images/blogs', 'public'); // Simpan ke direktori `storage/app/public/images/blogs`
            $blog->img = $path;
        }

        $blog->judul_artikel = $request->judul_artikel;

        $slug = Str::slug($request->judul_artikel);
        $existingSlugCount = Blog::where('slug', 'like', $slug . '%')->count();
        $blog->slug = $existingSlugCount > 0 ? "{$slug}-{$existingSlugCount}" : $slug;

        $blog->isi_artikel = $request->isi_artikel;
        $blog->jenis_artikel = $request->jenis_artikel;

        $blog->save();

        return redirect('/#blog')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $currentArticle = Blog::where('slug', $slug)->first(); // Find blog by slug
        if (!$currentArticle) {
            abort(404); // If article not found, return 404
        }

        // Fetch related articles (Limit to 5)
        $relatedArticles = Blog::where('id', '!=', $currentArticle->id)->limit(5)->orderBy('created_at', 'desc')->get();

        // Pass the current article, related articles, and jenisArtikel to the view
        return view('show', compact('currentArticle', 'relatedArticles'), ['title' => $currentArticle->judul_artikel]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::where('slug', $id)->first();

        if (!$blog) {
            abort(404); // If article not found, return 404
        }

        return view('admin.blog.edit', compact('blog'), ['title' => 'Edit Blog']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        if (!$blog) {
            abort(404); // If article not found, return 404
        }

        $request->validate(
            [
                'img' => 'nullable|image|mimes:jpeg,png,jpg', // Image is optional for update
                'judul_artikel' => 'required',
                'isi_artikel' => 'required',
                'jenis_artikel' => 'required',
            ],
            [
                'img.image' => 'File must be an image',
                'img.mimes' => 'Only jpeg, png, and jpg files are allowed',
                'judul_artikel.required' => 'Article title is required',
                'isi_artikel.required' => 'Article content is required',
                'jenis_artikel.required' => 'Article type is required',
            ]
        );

        // Handle image upload if a new image is uploaded
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $path = $file->store('images/blogs', 'public'); // Simpan ke direktori `storage/app/public/images/blogs`
            $blog->img = $path;
        }

        $blog->judul_artikel = $request->judul_artikel;

        $slug = Str::slug($request->judul_artikel);

        // Ensure the slug is unique, except for the current blog being updated
        $existingSlugCount = Blog::where('slug', $slug)
            ->where('id', '!=', $blog->id) // Exclude the current blog
            ->count();

        // Append a number if the slug is taken, but skip the current blog
        $blog->slug = $existingSlugCount > 0 ? "{$slug}-{$existingSlugCount}" : $slug;

        $blog->isi_artikel = $request->isi_artikel;
        $blog->jenis_artikel = $request->jenis_artikel;

        $blog->save();

        return redirect('/#blog')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::destroy($id);
        return redirect('/#blog')->with('success', 'Blog deleted successfully');
    }
}
