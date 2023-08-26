<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dep;
use App\Http\Requests\StoreutilisateurRequest;
use App\Http\Requests\UpdateutilisateurRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

use App\Mail\DabalyMailPersonnel;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exist=User::where('id',session()->get('the_user')[0]->id)->first();
        if($exist->affectation!=NULL)
        {
            $users = User::where('profil','membre')->where('dep_id',$exist->affectation)->get();
            return view('admin.utilisateur',compact('users'));
        }
        else
        {
            $users = User::get();
            return view('admin.utilisateur',compact('users'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreutilisateurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreutilisateurRequest $request)
    {
        

        $data = $request->all();
        $password = uniqid();
        $data['password'] = Hash::make($password);
        $data['status'] = true;
        User::create($data);
        $data_email =[
            'title'=>'Bonjour '.$request->name,
            'body'=>'Veuillez recevoir les informations de votre compte ',
            'demande'=>'',
            'infos'=>'Login : '.$request->email.' | Password : '.$password,
        ];

        Mail::to($request->email)->send(new DabalyMailPersonnel($data_email));
        return redirect()->route('users.index')->with('success',"Utilisateur enregistré");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
       
        return view('pages.admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        return view('pages.admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateutilisateurRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateutilisateurRequest $request, User $user)
    {
        
     
       $data = array(
                    "sexe" => $request->sexe,
                    "name" => $request->name,
                    "telephone" => $request->telephone,
                    "email" =>$request->email,
                    "profil" => $request->profil
                   );
        User::where('id',$user->id)->update($data);

        return redirect()->route('users.index')->with('success',"Utilisateur modifié");
    }

    public function updateStatus(Request $request, User $user)
    {
        $status=0;
        if($user->status==0)
        {
            $status=1;
        }


        $user->update(['status' => $status]);

        return response()->json(['success' => 'Statut de l\'utilisateur mis à jour avec succès.'], 200);
    }

    public function superviser(Request $request)
    {
        if($request->etat=='nommer')
        {
            $exist=User::where('affectation',$request->dep_id)->first();

            if(!$exist)
            {
                $user=User::where('id',$request->id)->first();
                $user->update(['affectation' => $request->dep_id,'profil' => 'admin']);
                return redirect()->back()->with('success', 'Arrondissement attribué.');
        
            }
            else
            {
                return redirect()->back()->with('auth_error', 'Arrondissement déjà attribué, impossible.');
            }
        }
        else if($request->etat=='denommer')
        {
            $user=User::where('id',$request->id)->first();
            $user->update(['affectation' => NULL,'profil' => 'membre']);
            return redirect()->back()->with('success', 'Arrondissement desattribué.');
        }
        else
        {
            return redirect()->back()->with('auth_error', 'Veuillez réessayer une erreur est survenue.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        User::find((int)$id)->delete();
        return redirect()->route('users.index')->with('success',"Utilisateur supprimé");
    }


    public function lock($id,$status){
       
        $newstatus = $status == "true" ? true : false;
        User::where('id',(int)$id)->update(['status'=>$newstatus]);
        return redirect()->route('users.index')->with('success',"Status compte modifié");
    }

    public function reset($id){
        $password = uniqid();
        $newpassword = Hash::make($password);
        $user = User::find((int)$id);
        User::where('id',(int)$id)->update(['password'=>$newpassword]);
        $data_email =[
            'title'=>'Bonjour '.$user->name,
            'body'=>'Veuillez recevoir les informations de votre compte',
            'demande'=>'',
            'infos'=>'Login : '.$user->email.' | Password : '.$password,
        ];

        Mail::to($user->email)->send(new DabalyMailPersonnel($data_email));
        return redirect()->route('users.index')->with('success',"mot de passe changé");
       
    }


    public function show_compte($id){
         $user = User::find($id);
        
         return view('pages.admin.users.show_compte',compact('user'));
        
    }

    public function update_password(){

         return view('pages.admin.users.change_password');
    }

    public function changePassword(Request $request){
        $ancien_mot_de_passe=$request->ancien_mot_de_passe;
        $nouveau_mot_de_passe=$request->nouveau_mot_de_passe;
        $confirm_mot_de_passe=$request->confirm_mot_de_passe;
        $get_password = User::where('id', session()->get('the_user')[0]->id)->first();
        if (Hash::check($ancien_mot_de_passe, $get_password->password)) 
        {
            if ($nouveau_mot_de_passe == $confirm_mot_de_passe)
            {
                $password = Hash::make($nouveau_mot_de_passe);
                $user =User::where('id', session('the_user')[0]->id)->update(['password'=>$password]);
                
                return redirect()->back()->with('update_password_success', 'Veuillez réessayer une erreur est survenue.');
            }
            else
            {
                return redirect()->back()->with('error_confirm_password', 'Veuillez réessayer une erreur est survenue.');
            }
        }
        else
        {
            return redirect()->back()->with('error_old_password', 'Veuillez réessayer une erreur est survenue.');
        }
        

    }
}
