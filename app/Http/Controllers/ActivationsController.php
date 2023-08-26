<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ActivationsController extends Controller
{
    public function activate(Request $request)
    {
        $url = $request->path();
        $segments=explode('/',$url);
        $email = end($segments);
       // dd($request);
        $data_user = User::where('email', $email)->first();
        if (!$data_user) {
            return redirect()->route('sign-in')->with('error', "L'utilisateur n'existe pas.");
        }
        $data_user->status = 1;
        $data_user->save();
        return redirect()->route('sign-in')->with('success', "Votre compte a été activé avec succès.
         Vous pouvez maintenant vous connecter.");
    }
}





