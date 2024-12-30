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

    public function delete(string $id)
    {
        Message::destroy($id);
        return redirect()->back()->with('success', 'Message removed successfully');
    }
}
