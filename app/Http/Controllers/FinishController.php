<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function finish(Request $request)
     {
       $message="l'action a échoué";
       $table= $request->item;
       $action= $request->action;
       $id= $request->id;
       if($action=='livrer')
       {
         DB::table($table)->where('id',$id)->update(['etat'=>'finish']);
         $message="votre demande va être livrée";
       }
       else if($action=='supprimer')
       {
         $id_user = DB::select(DB::raw("select id_utilisateur from {$table} where id={$id}"))[0]->id_utilisateur;
         DB::table($table)->where('id',$id)->delete();
         DB::table('utilisateurs')->where('id',$id_user)->delete();
         $message="cette demande va être supprimée";
       }
       return json_encode($message);
     }
}
