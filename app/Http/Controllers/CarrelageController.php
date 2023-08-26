<?php

namespace App\Http\Controllers;
use App\Models\Carrelage;
use App\Models\BlogImage;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;
use Image;

use Illuminate\Http\Request;

class CarrelageController extends Controller
{
    
  /*   point d'entrer carrelage */
    public function index(){

        $carrelages = Carrelage::with('blog_images')->orderBy('created_at','desc')->get();
      
        return view('admin.carrelages.index',['carrelages'=>$carrelages]);
    }
    public function actu(){

        $carrelages = Carrelage::with('blog_images')->orderBy('created_at','desc')->get();
        //dd($carrelages[0]->blog_images[0]->blog_image);
      
        return view('admin.carrelage',['carrelages'=>$carrelages]);
    }

/*     afficher le formulaire de creation de carrelage */
    public function create(){
        return view('admin.carrelages.create');
    }
    
/*     change status carrelage  */

    public function changeStatus(Request $request){
        if($request->status == "s")
        {

            foreach($request->infos as $i){
                    Carrelage::find($i)->delete();
                    $blog_images = BlogImage::where('carrelage_id',(int)$i)->get();
                   
                    foreach($blog_images as $j){
                     
                        Storage::disk('uploads')->delete("/images/carrelages/".$j->blog_image);
                    }

                    BlogImage::where('carrelage_id',(int)$i)->delete();
                    
            }
            
        }else{
            foreach($request->infos as $i){
                Carrelage::where('id',(int)$i)->update(['status'=>$request->status]);
            }
        }
        
        return redirect()->back()->with('success', 'demande traité.');
    }



  /*   show carrelage in page admin */
    public function showCarrelage(Request $request){

        $carrelage = Carrelage::where('id',(int)$request->id)->with('blog_images')->first();
       
        return view('admin.carrelages.show',['carrelage'=>$carrelage]);
    }

    public function saveEditCarrelage(Request $request){
        $this->validate($request, [
            'categorie' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);
        
        $user = session('the_user')[0];
        $nom = $request->nom;
        $description = $request->description;
        $status = $request->status;
        $images = $request->images;
        $categorie = $request->categorie;
        $qte = $request->qte;
        $prix = $request->prix;
        
          
        $carrelage = Carrelage::where("id",$request->id)->update([
            'nom'=>$nom,
            'description'=>$description,
            'status'=>$status,
            'user_id'=>$user->id,
            'qte'=>$qte,
            'prix'=>$prix,
            'categorie'=>$categorie
        ]);
        if($request->hasfile('images'))
        {
                $blog_images = BlogImage::where('carrelage_id',(int)$request->id)->get();
                    
                foreach($blog_images as $j){
                    // Storage::disk('uploads/images/carrelages')->delete($j->blog_image);
                    Storage::disk('public')->delete("uploads/".$j->blog_image);
                    BlogImage::where('id',(int)$j->id)->delete();
                }
               foreach($request->file('images')  as $image){
                $target= 'images/carrelages';
                $img = Image::make($image);
                $filname=$image->getClientOriginalName();
                //$img->resize(520, 420); // Redimensionnement de l'image à 120 x 80 px
                //$url=$img->save(public_path().'/uploads/images/carrelages/'.$filname);
                
                    $path = $img->storeAs($target, $filname, 'uploads');
                    $url=$path;

                   BlogImage::create([
                       'carrelage_id'=> $request->id,
                       'blog_image'=>$url,
                       'blog_image_title'=>$nom
                   ]);
               }
        }

        return redirect()->route('carrelage');
    }

    public function saveCarrelage(Request $request){
        $this->validate($request, [
            'categorie' => 'required|string|max:255',
            'visibilite' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);
        
        $user = User::where('id',session('the_user')[0]->id)->first();
        $nom = $request->nom;
        $description = $request->description;
        $status = "active";
        $images = $request->images;
        $categorie = $request->categorie;
        $qte = $request->qte;
        $prix = $request->prix;
        $visibilite = $request->visibilite;
        
        $carrelage = Carrelage::create([
            'nom'=>$nom,
            'description'=>$description,
            'status'=>$status,
            'user_id'=>$user->id,
            'region_id'=>$user->region_id,
            'dep_id'=>$user->dep_id,
            'categorie'=>$categorie,
            'qte'=>$qte,
            'prix'=>$prix,
            'visibilite'=>$visibilite
        ]);
        if($request->hasfile('images'))
        {
               foreach($request->file('images')  as $image){
                //$imageName = $request->get("nom").$request->get("couleur").".".$request->file("imageUrl")->extension();
                $target= 'images/carrelages';
                    $img = $image;
                    $filname=$image->getClientOriginalName();
                    //$img->resize(520, 420); // Redimensionnement de l'image à 120 x 80 px
                    //$img->save(public_path().'/uploads/images/carrelages/'.$filname);
                    
                    $path = $img->storeAs($target, $filname, 'uploads');
                    $url=$path;
                    
                   BlogImage::create([
                       'carrelage_id'=> $carrelage->id,
                       'blog_image'=>$url,
                       'blog_image_title'=>$nom
                   ]);
               }
        }

        return redirect()->route('carrelage');

    }


    public function editCarrelage(Request $request){
        $carrelage = Carrelage::where('id',(int)$request->id)->with('blog_images')->first();
       
        return view('admin.carrelages.edit',['carrelage'=>$carrelage]);
    }

    
    public function carrelageDetaille(Request $request){
       
        $carrelage = Carrelage::where('id',(int)$request->id)->with('blog_images')->first();
        $carrelages = Carrelage::where('status','p')->with('blog_images')->orderBy('created_at','desc')->take(3)->get();
       
        return view('pages.carrelage',['carrelage'=>$carrelage,"carrelages"=>$carrelages,'header'=>"Actualité"]);
    }
}
