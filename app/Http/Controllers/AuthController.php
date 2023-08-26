<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\Carrelage;
use App\Models\BlogImage;

use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{
    public function sign_in()
    {
        return view('pages.login');
    }

    public function connexion(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'mot_de_passe' => 'required'
        ]);

        $get_login = User::where('email', $request->email)->get(
            [
                'id', 'email', 'prenom', 'nom', 'telephone', 'status', 'profil', 
            ]
        );
       
        if (count($get_login) > 0) 
        {
            $get_password = User::where('email', $get_login[0]->email)->get();

            if (Hash::check($request->mot_de_passe, $get_password[0]->password)) 
            {
                $request->session()->put('the_user', $get_login);
                $profil = $get_login[0]->profil;
             
                if($get_login[0]->status == 1)
                {
                    return redirect('/adminPanel');
                }
                else
                {
                 
                    return redirect('sign-in')->with('lock', 'Votre compte est bloqué');
                }
              
            } 
            else 
            {
                return redirect('sign-in')->with('auth_error', 'login ou mot de passe incorrect');
            }
        } 
        else 
        {
            return redirect('sign-in')->with('auth_error', 'ce compte est pas');
        }
    }

    public function protect(Request $request)
    {
        if (empty($request->session()->get('the_user'))) 
        {
            return redirect('sign-in');
        } 
        else 
        {
            $the_user = $request->session()->get('the_user');
           
            if ($the_user[0]->profil == 'admin') 
            {
                $exist=User::where('id',$the_user[0]->id)->first();
                if($exist->affectation==NULL)
                {
                    $carrelages = Carrelage::with('blog_images')->orderBy('created_at','desc')->get();
                    return view('admin.carrelages.index',['carrelages'=>$carrelages])->with('the_user', $the_user);
                }
                else
                {
                    $request->session()->forget('the_user');
                    return redirect('sign-in');

                }
            }
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('the_user');
        return redirect('sign-in');
    }
}
