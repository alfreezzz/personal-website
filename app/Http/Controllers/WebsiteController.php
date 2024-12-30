<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Skill;
use App\Mail\ContactUs;
use App\Models\Experience;
use App\Models\Message;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        $skills = Skill::paginate(6);
        $experiences = Experience::all();
        $projectcategories = Portofolio::select('jenis_apk')->distinct()->get();

        $projects = Portofolio::when($request->filled('jenis_apk'), function ($query) use ($request) {
            return $query->where('jenis_apk', $request->jenis_apk);
        })
            ->when($request->filter == 'latest', function ($query) {
                return $query->orderBy('tgl_selesai', 'desc'); // Filter terbaru
            })
            ->when($request->filter == 'oldest', function ($query) {
                return $query->orderBy('tgl_selesai', 'asc'); // Filter terlama
            })
            ->get();

        // Filter untuk kategori blog
        $blogcategories = Blog::select('jenis_artikel')->distinct()->get();

        $blogs = Blog::when($request->filled('jenis_artikel'), function ($query) use ($request) {
            return $query->where('jenis_artikel', $request->jenis_artikel);
        })->orderBy('created_at', 'desc')
            ->get();

        return view('welcome', compact('skills', 'experiences', 'projects', 'projectcategories', 'blogs', 'blogcategories'));
    }

    public function send()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ]);
        Mail::to('roshinante678@gmail.com')->send(new ContactUs($data));

        Message::create($data);

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}
