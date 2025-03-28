<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
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
