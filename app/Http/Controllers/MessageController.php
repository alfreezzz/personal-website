<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MessageController extends Controller
{

    public function index(Request $request)
    {
        $query = Message::query();
        $filter = $request->query('filter', 'latest'); // default: latest

        if ($filter === 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($filter === 'earliest') {
            $query->orderBy('created_at', 'asc');
        } elseif ($filter === 'range') {
            if ($request->filled('start_date')) {
                $query->whereDate('created_at', '>=', Carbon::parse($request->start_date));
            }
            if ($request->filled('end_date')) {
                $query->whereDate('created_at', '<=', Carbon::parse($request->end_date));
            }
        }

        $messages = $query->get();

        return view('admin.messages.index', compact('messages'), ['title' => 'Messages']);
    }

    public function delete(string $id, Request $request)
    {
        if (!$request->query('token') || $request->query('token') !== env('ADMIN_ACCESS_TOKEN')) {
            return redirect('/')->with('error', 'Unauthorized access!');
        }

        Message::destroy($id);

        return redirect('/admin/messages?token=' . $request->query('token'))
            ->with('success', 'Message removed successfully');
    }
}
