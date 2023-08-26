<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnvoiMail;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Entreprise;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;


class InscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //  return view('pages.create');
    }
       //save User
    public function saveUser($data_user){
        $data_user['profil']='membre';
        $user = User::create($data_user);
        return $user->id;
    }
 //save UserInfos
    public function saveUserInfo($data_user_info){
        return UserInfo::create($data_user_info);
    }
   //save Entreprise
   public function saveEntreprise($data_entreprise){
        $entreprise = Entreprise::create($data_entreprise);
        return $entreprise->id;

    }
  // Validation de "name" et "email"

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //function save data
    public function store(Request $request)
    {
        $data_user=request('user');
        $data_user['password'] = Hash::make($data_user['password']);
        $data_user['region_id'] = $request->region;
        $data_user['dep_id'] = $request->dep;
        $data_user_info=request('info_user');
        $data_entreprise=request('info_entreprise');

        if(isset($data_entreprise['entreprise']))
        {
            $entreprise_id=$this->saveEntreprise($data_entreprise);
            $data_user_info["entreprise_id"]=$entreprise_id;
        }
        $user_id=$this->saveUser($data_user);
        $data_user_info["user_id"]=$user_id;
        $this->saveUserInfo($data_user_info);
        // Envoi de l'email de confirmation
        Mail::to($data_user['email'])->send(new EnvoiMail($data_user_info,$data_user));
        return back()->with('success', 'Veuillez vérifier votre e-mail pour activer votre compte');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
