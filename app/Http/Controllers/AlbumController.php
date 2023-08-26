<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployerAlbum;
use Image;
use Storage;
class AlbumController extends Controller
{
    //
    public function index(){
      $albums  = EmployerAlbum::get();

      return view('pages.admin.album.index',compact('albums'));
    }

    public function create(){
        return view('pages.admin.album.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nom' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'fonction' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);
        
       
        $nom = $request->nom;
        $telephone = $request->telephone;
        $images = $request->images;
        $fonction = $request->fonction;
        
        
        $img = Image::make($request->images);
        $filname=$request->images->getClientOriginalName();
        $album = EmployerAlbum::create([
            'nom'=>$nom,
            'telephone'=>$telephone,
            'fonction'=>$fonction,
            'photo'=>$filname,
        ]);
      
        $img->resize(420, 420); // Redimensionnement de l'image à 120 x 80 px
    	$img->save(public_path().'/albums/'.$filname);
      

        return redirect()->route('album.index');

    }
   
    public function destroy($id){
          $album = EmployerAlbum::find((int)$id);
          Storage::disk('albums')->delete($album->photo);
          $album->delete();
          return redirect()->route('album.index');
    }
}
