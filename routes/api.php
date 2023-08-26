<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 // Route pour renvoyer la liste des carreaux
    Route::get('/carrelages', function () {
        $carrelages = App\Models\Carrelage::where('status','p')->with('blog_images')->orderBy('created_at','desc')->get();
        //dd($carrelages[0]->blog_images[0]->blog_image);
        // Mapper pour ajouter le lien URL de la photo de chaque carreau
        $carrelages = $carrelages->map(function ($carrelage) {
                    
                foreach($carrelage->blog_images as $j){
                    $j->blog_image = asset('uploads/'.$j->blog_image);
                    return $carrelage;
                }
        });
        return response()->json($carrelages);
    });
    Route::get('/carrelage/{id}', function ($id)
    {
        $carrelage = App\Models\Carrelage::where('id',$id)->with('blog_images')->first();
        //dd($carrelage);
        if ($carrelage)
        {
            foreach($carrelage->blog_images as $j){
                $j->blog_image = asset('uploads/'.$j->blog_image);
                return $carrelage;
            }
            return response()->json($carrelage);
        }
        else
        {
            return response()->json(['message' => 'Carreau introuvable.'], 404);
        }
    });
