<?php

// app/Http/Controllers/ContributionController.php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\User;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    public function index()
    {
        $exist=User::where('id',session()->get('the_user')[0]->id)->first();
        if($exist->affectation!=NULL)
        {
            
            $users = User::where('profil','membre')->where('dep_id',$exist->affectation)->with('contributions')->get();
            return view('admin.contributions.index', compact('users'));
        }
        else
        {
            
            $users = User::with('contributions')->get();
            return view('admin.contributions.index', compact('users'));

        }
    }

    public function create()
    {
        $exist=User::where('id',session()->get('the_user')[0]->id)->first();
        if($exist->affectation!=NULL)
        {
            
            $users = User::where('profil','membre')->where('dep_id',$exist->affectation)->get();
            return view('admin.contributions.create', compact('users'));
        }
        else
        {
            $users = User::all();
            return view('admin.contributions.create', compact('users'));

        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        Contribution::create($request->all());

        return redirect()->route('contributions.index');
    }
}
