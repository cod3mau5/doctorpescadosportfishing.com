<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Panga;
use App\Rate;
use App\Captain;
use App\ImageBoat;
use App\BoatSpecification;
use Carbon\Carbon;
use Validator,Str,Config,Image;

class PangasController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isFisherman');
    }
    
    public function index()
    {
        $pangas= Panga::get();
        return view('panel.pangas.index',compact('pangas'));
    }


    public function create()
    {

        return view('panel.pangas.create');
    }


    public function store(Request $request)
    {

        $rules=[
            'img'=>'required',
            'img'=>'mimes:jpeg,bmp,png|max:91872749',
            'name'=> 'required',
            'max_anglers'=>'required',
            'feets'=>'required',
            // 'description'=>'required',
        ];

        $messages=[
            'img.required'=>'La imagen destacada es requerida.',
            'img.mimes'=>'El archivo que cargaste no es una imagen valida.',
            'name.required'=>'Se requiere ingresar un nombre para la panga.',
            'max_anglers.required'=>'Se requiere ingresar la capacidad maxima de personas de la panga.',
            'feets.required'=>'Se requiere ingresar el tamaño de la panga',
            // 'description.required'=>'El contenido es requerido',
        ];

        $validator= Validator::make($request->all(), $rules,$messages);

        if($validator->fails()){

            return response()->json($validator->errors());

        }else{
            
            $path= '/'.date('Y-m-d');
            $fileExt= trim($request->img->getClientOriginalExtension());
            $uploadPath=Config::get('filesystems.disks.uploads.root');
            $name=Str::slug(str_replace($fileExt,'',$request->img->getClientOriginalName()));
    
            $fileName= rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file=$uploadPath.'/'.$path.'/'.$fileName;
            
            // dd($file_file);


                if(!is_dir(public_path('/img/pangas/'))){
                    mikdir( public_path('/img/pangas/'),0777 );
                }else{
                    // dd($request->all());
                    if($request->hasFile('img')){
                        $img=$request->img;
                        $base_name= Str::random();
                        $original= $base_name . '.' . $img->getClientOriginalExtension();

                        $img->move(public_path('/img/pangas/'),$original);

                        $panga=Panga::create([
                            'name' => $request['name'],
                            'img' => '/img/pangas/' . $original,
                            'description' => $request['description'],
                            'max_anglers' => $request['max_anglers'],
                            'feets' => $request['feets'],
                        ]);
                        

                        return response()->json(
                            [
                                'action'=>'success',
                                'panga_id'=>$panga->id,
                                'panga_name'=>$panga->name,
                                'panga_img'=>$panga->img
                            ]
                        );
                    }
                }
                
        }

    }


    public function show($id)
    {
        $panga= Panga::findOrFail($id);

        if($panga->rate &&  $panga->captain){
            return view('panel.pangas.show',compact('panga'));
        }else{
            return 'Panga No disponible para exibicion';
        }
    }

    public function edit($id)
    {
        $panga= Panga::findOrFail($id);
        $panga_images= ImageBoat::where('panga_id',$id)->latest()->get();
        $captain= Captain::where('panga_id',$id)->first();
        $boatSpecs= BoatSpecification::where('panga_id',$id)->first();
        $rates= Rate::where('panga_id',$id)->latest()->get();
        
        return view('panel.pangas.edit',compact('panga','panga_images','rates','captain','boatSpecs'));
    }


    public function update(Request $request, $id)
    {

        $rules=[
            'img'=>'required',
            'img'=>'mimes:jpeg,bmp,png|max:91872749',
            'name'=> 'required',
            'max_anglers'=>'required',
            'feets'=>'required',
        ];

        $messages=[
            'img.required'=>'La imagen destacada es requerida.',
            'img.mimes'=>'El archivo que cargaste no es una imagen valida.',
            'name.required'=>'Se requiere ingresar un nombre para la panga.',
            'max_anglers.mimes'=>'Se requiere ingresar la capacidad maxima de personas de la panga.',
            'feets.required'=>'Se requiere ingresar el tamaño de la panga',
        ];

        $validator= Validator::make($request->all(), $rules,$messages);

        if($validator->fails()){

            return response()->json($validator->errors());

        }else{

            $panga=Panga::findOrFail($id);

            $path= '/'.date('Y-m-d');
            $fileExt= trim($request->img->getClientOriginalExtension());
            $uploadPath=Config::get('filesystems.disks.uploads.root');
            $name=Str::slug(str_replace($fileExt,'',$request->img->getClientOriginalName()));
    
            $fileName= rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file=$uploadPath.'/'.$path.'/'.$fileName;
            
            // dd($file_file);


                if(!is_dir(public_path('/img/pangas/'))){
                    mikdir( public_path('/img/pangas/'),0777 );
                }else{
                    // dd($request->all());
                    if($request->hasFile('img')){
                        $img=$request->img;
                        $base_name= Str::random();
                        $original= $base_name . '.' . $img->getClientOriginalExtension();

                        $img->move(public_path('/img/pangas/'),$original);


                        $panga->update([
                            'name' => $request['name'],
                            'img' => '/img/pangas/' . $original,
                            'description' => $request['description'],
                            'max_anglers' => $request['max_anglers'],
                            'feets' => $request['feets'],
                        ]);
                        // $panga=Panga::create([
                        //     'name' => $request['name'],
                        //     'img' => '/img/pangas/' . $original,
                        //     'description' => $request['description'],
                        //     'max_anglers' => $request['max_anglers'],
                        //     'feets' => $request['feets'],
                        // ]);
                        

                        return response()->json(
                            [
                                'action'=>'success',
                                'panga_id'=>$panga->id,
                                'panga_name'=>$panga->name,
                                'panga_img'=>$panga->img
                            ]
                        );
                    }
                }
                
        }

    }


    public function destroy($id)
    {
        $panga=Panga::findOrFail($id);
        $title=$panga->name;
        $panga->delete();
        return back()->with('message','Panga '.$title. ' eliminada!')->with('typealert','danger')->with('display','d-flex');
    }
}
