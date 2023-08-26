<?php

use App\Http\Controllers\CarrelageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\MessageController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[AuthController::class, 'protect'])->name('adminPanel');
Route::get('inscrire', [App\Http\Controllers\HomeController::class, 'create'])->name('inscrire');
//Route::get('sign-in', [App\Http\Controllers\HomeController::class, 'sign_in'])->name('sign-in');

Route::get('adminPanel', [AuthController::class, 'protect'])->name('adminPanel');

/* Connexion */
Route::get('sign-in', [AuthController::class, 'sign_in'])->name('sign-in');
Route::post('connexion', [AuthController::class, 'connexion']);
Route::get('deconnexion', [AuthController::class, 'logout'])->name('deconnexion');
/*Route::get('login', function () {
    return view('admin.utilisateur');
});*/

Route::group(['middleware' => 'profil'], function ()
{
    //Route::get('change-password/{id}', [UtilisateurController::class, 'change_password']);
    Route::get('update_password', [UtilisateurController::class, 'update_password'])->name('update_password');
    Route::get('users/show_compte/{id}',[UtilisateurController::class,'show_compte'])->name('show_compte');
    Route::post('changePassword',[UtilisateurController::class,'changePassword'])->name('changePassword');


});

Route::group(['middleware' => 'admin'], function () {
    
    /*   admin routes carrelage */

     Route::get('carrelage',[CarrelageController::class,'index'])->name('carrelage');
     Route::get('actu',[CarrelageController::class,'actu'])->name('actu');
     Route::get('all_carrelage',[CarrelageController::class,'getAllBlogs'])->name('all_carrelage');
     Route::get('create_carrelage',[CarrelageController::class,'create'])->name('create_carrelage');
     Route::post('save_carrelage',[CarrelageController::class,'saveCarrelage'])->name('save_carrelage');
     Route::post('change_status',[CarrelageController::class,'changeStatus'])->name('change_status');
     Route::get('show_carrelage/{id}',[CarrelageController::class,'showCarrelage'])->name('show_carrelage');
     Route::get('edit_carrelage/{id}',[CarrelageController::class,'editCarrelage'])->name('edit_carrelage');
     Route::post('save_edit_carrelage',[CarrelageController::class,'saveEditCarrelage'])->name('save_edit_carrelage');

    /* user controller */

     Route::resource('users', UtilisateurController::class);
     Route::get('user/desactiver/{id}/{status}',[UtilisateurController::class,'lock'])->name('lock');
     Route::get('user/reset/{id}',[UtilisateurController::class,'reset'])->name('reset');
     Route::get('user/delete/{id}',[UtilisateurController::class,'destroy'])->name('users.delete');
     Route::post('/users/{user}', [UtilisateurController::class,'updateStatus'])->name('users.updateStatus');
     Route::post('superviser', [UtilisateurController::class,'superviser'])->name('users.superviser');



     /* contributions */

    Route::get('/contributions', [ContributionController::class, 'index'])->name('contributions.index');
    Route::get('/contributions/create', [ContributionController::class, 'create'])->name('contributions.create');
    Route::post('/contributions', [ContributionController::class, 'store'])->name('contributions.store');

    
    /* messaging */

    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/{user}', [MessageController::class, 'show'])->name('messages.show');

     

 /* welcon route carrelage detaille */
    Route::get('carrelage_det/{id}',[CarrelageController::class,'carrelageDetaille'])->name('carrelage_det');

    
    Route::get('update_password', [UtilisateurController::class, 'update_password'])->name('update_password');
    Route::get('users/show_compte/{id}',[UtilisateurController::class,'show_compte'])->name('show_compte');
    Route::post('changePassword',[UtilisateurController::class,'changePassword'])->name('changePassword');
});

Route::group(['middleware' => 'membre'], function () {
    
    /*   admin routes carrelage */

     Route::get('accueil',[CarrelageController::class,'actu'])->name('accueil');

     
    /* messaging */

    Route::get('/messaging', [MessageController::class, 'index'])->name('messaging.index');
    Route::post('/messaging', [MessageController::class, 'store'])->name('messaging.store');
    Route::get('/messaging/{user}', [MessageController::class, 'show'])->name('messaging.show');

    
    Route::get('update_passwords', [UtilisateurController::class, 'update_password'])->name('update_passwords');
    Route::get('users/show_comptes/{id}',[UtilisateurController::class,'show_compte'])->name('show_comptes');
    Route::post('changePasswords',[UtilisateurController::class,'changePassword'])->name('changePasswords');

});



 /* welcon route carrelage detaille */
    Route::get('carrelage_detaille/{id}',[CarrelageController::class,'carrelageDetaille'])->name('carrelage_detaille');


Route::resource('/inscriptions', App\Http\Controllers\InscriptionsController::class);
Route::get('activation/{email}', [App\Http\Controllers\ActivationsController::class ,'activate'])->name('activation');
