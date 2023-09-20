<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TypeProduit;
use Illuminate\Support\Facades\File;
use Image;
class TypeProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = TypeProduit::latest()->paginate(5);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
            $request->validate([
            'nomType' => 'required',
            
        ]);

        $type = new TypeProduit();
            $type->nomType = $request->nomType;
            $type-> save();


            // On enregistre l'image ici
            /*if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.',$tempImage->nom);
                $ext = last($extArray);

                $newImageName =  $type->id.'.'.$ext;
                $sPath = public_path().'/temp/'.$tempImage->nom;
                $dPath = public_path().'/uploads/type/'.$newImageName;
                File::copy($sPath,$dPath);

                // Generate image Thumnail
                // $dPath = public_path().'/uploads/type/thumb/'.$newImageName;
                // $img = Image::make($sPath);
                // $img->resize(450, 600);
                // $img->save($dPath );

                $type->image = $newImageName;
                $type-> save();


            }*/
            $request->session()->flash('success', 'Type ajouté avec succés');

        return redirect()->route('types.index');
    }

    //    $validator = Validator::make($request->all(),[
    //     'nomTypes' => 'required', 
    //     'statut' => 'required' 
    // ]);
    // if ($validator->passes()){
    //     $type = new TypeProduit();
    //     $type->nomType = $request->nomType;
    //     $type-> save();


    // } else{
    //     return redirect()->route('types.index')->with('error', 'nom incorrect');
    // }


   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($typeId, Request $request)
    {
        $type = TypeProduit::find($typeId);
       if(empty($type)){
        return redirect()->route('types.index');
       }
        
        return view('admin.types.edit', compact('type'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($typeId, Request $request): RedirectResponse
    {
        $type = TypeProduit::find($typeId);
    //    if(empty($type)){
    //     return response()->json([
    //         'status' => false,
    //         'notFound' => true,
    //         'message' => 'type non reconnu'
    //     ]);
    //    }
       $request->validate([
        'nomType' => 'required',
        
    ]);

        $type->nomType = $request->nomType;
        $type->statut = $request->statut;
        $type-> save();

          // On enregistre l'image ici
          /*if(!empty($request->image_id)){
            $tempImage = TempImage::find($request->image_id);
            $extArray = explode('.',$tempImage->nom);
            $ext = last($extArray);

            $newImageName =  $type->id.'.'.$ext;
            $sPath = public_path().'/temp/'.$tempImage->nom;
            $dPath = public_path().'/uploads/type/'.$newImageName;
            File::copy($sPath,$dPath);

            //Generate image Thumnail
            // $dPath = public_path().'/uploads/type/thumb/'.$newImageName;
            // $img = Image::make($sPath);
            // $img->resize(450, 600);
            // $img->save($dPath );

            $type->image = $newImageName;
            $type-> save();


        }*/
        $request->session()->flash('success', 'Type modifier avec succés');

    return redirect()->route('types.index');
    //return redirect()->route('types.index')->with('success','types created successfully.');
        

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($typeId, Request $request)
    {
        $type = TypeProduit::find($typeId);
        //File::delete(public_path().'/uploads/type'.$type->image);
        $type->delete();
        $request->session()->flash('success', 'Type supprimmer avec succés');
        return redirect()->route('types.index');
                        
    }
}
