<?php

// app/Http/Controllers/MessageController.php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $users = User::all();
        $session_value = session()->get('the_user');
        $value = $session_value[0]->profil;

        if ($value == "admin") 
        {
            return view('admin.messages.index', compact('users'));
        }
        else if ($value == "membre")
        {
            return view('pages.messages.index', compact('users'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|exists:users,id',
            'recipient_id' => 'required|exists:users,id',
            'content' => 'required',
        ]);

        Message::create($request->all());
        $session_value = session()->get('the_user');
        $value = $session_value[0]->profil;

        if ($value == "admin") 
        {
            return redirect()->route('messages.index');
        }
        else if ($value == "membre")
        {
            return redirect()->route('messaging.index');
        }

        
    }

    public function show(User $user)
    {
        
        $session_value = session()->get('the_user');
        $value = $session_value[0]->profil;
        $id = $session_value[0]->id;

        $messages = Message::where(function ($query) use ($user, $id) {
            $query->where('sender_id',$id )->where('recipient_id', $user->id);
        })->orWhere(function ($query) use ($user, $id) {
            $query->where('sender_id', $user->id)->where('recipient_id', $id);
        })->orderBy('created_at')->get();

        

        if ($value == "admin") 
        {
            return view('admin.messages.show', compact('user', 'messages'));
        }
        else if ($value == "membre")
        {
            return view('pages.messages.show', compact('user', 'messages'));
        }

        
    }
}
