<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Charter;
use App\Rate;
use App\Captain;
use App\ImageBoat;
use App\BoatSpecification;
use Carbon\Carbon;
use Validator,Str,Config,Image;

class ChartersController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isFisherman');
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charters= Charter::get();

        return view('panel.charters.index',compact('charters'));
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.charters.create');
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            'name.required'=>'Se requiere ingresar un nombre para la lancha.',
            'max_anglers.required'=>'Se requiere ingresar la capacidad maxima de personas de la lancha.',
            'feets.required'=>'Se requiere ingresar el tamaño de la lancha',
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


                if(!is_dir(public_path('/img/charters/'))){
                    mikdir( public_path('/img/charters/'),0777 );
                }else{
                    if($request->hasFile('img')){
                        $img=$request->img;
                        $base_name= Str::random();
                        $original= $base_name . '.' . $img->getClientOriginalExtension();

                        $img->move(public_path('/img/charters/'),$original);

                        $charter=Charter::create([
                            'name' => $request['name'],
                            'img' => '/img/charters/' . $original,
                            'description' => $request['description'],
                            'max_anglers' => $request['max_anglers'],
                            'feets' => $request['feets'],
                        ]);


                        return response()->json(
                            [
                                'action'=>'success',
                                'charter_id'=>$charter->id,
                                'charter_name'=>$charter->name,
                                'charter_img'=>$charter->img
                            ]
                        );
                    }
                }

        }
    }

    /**
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $charter= Charter::findOrFail($id);
        if($charter->rate){
            return view('panel.charters.show',compact('charter'));
        }else{
            return 'Lancha No disponible para exibicion';
        }
    }

    /**
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $charter= Charter::findOrFail($id);
        $charter_images= ImageBoat::where('charter_id',$id)->latest()->get();
        $captain= Captain::where('charter_id',$id)->first();
        $boatSpecs= BoatSpecification::where('charter_id',$id)->first();
        $rates= Rate::where('charter_id',$id)->latest()->get();

        // dd($charter_images);

        // if( !empty($charter) && !empty($captain) && !empty($boatSpecs) && empty($rates[0]) ){ #NO RATES
        //     return 'NO RATES';
        // }elseif( !empty($charter) && !empty($captain) && empty($boatSpecs) && empty($rates[0]) ){ #NO RATES NO BOAT SPECS
        //     return 'NO RATES NO BOAT SPECS';
        // }
        // else{
        //     return 'false';
        // }

        return view('panel.charters.edit',compact('charter','charter_images','rates','captain','boatSpecs'));
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $charter=Charter::findOrFail($id);

        if($request->img != "undefined"){
            $rules=[
                'img'=>'mimes:jpeg,bmp,png|max:91872749',
                'name'=> 'required',
                'max_anglers'=>'required',
                'feets'=>'required',
            ];
        }else{
            $rules=[
                'name'=> 'required',
                'max_anglers'=>'required',
                'feets'=>'required',
            ];
        }

        $messages=[
            'img.mimes'=>'El archivo que cargaste no es una imagen valida.',
            'name.required'=>'Se requiere ingresar un nombre para la lancha.',
            'max_anglers.required'=>'Se requiere ingresar la capacidad maxima de personas de la lancha.',
            'feets.required'=>'Se requiere ingresar el tamaño de la lancha',
        ];

        $validator= Validator::make($request->all(), $rules,$messages);

        if($validator->fails()){

            return response()->json($validator->errors());

        }else{

            if($request->hasFile('img')){
                $path= '/'.date('Y-m-d');
                $fileExt= trim($request->img->getClientOriginalExtension());
                $uploadPath=Config::get('filesystems.disks.uploads.root');
                $name=Str::slug(str_replace($fileExt,'',$request->img->getClientOriginalName()));

                $fileName= rand(1,999).'-'.$name.'.'.$fileExt;
                $file_file=$uploadPath.'/'.$path.'/'.$fileName;
            }



                if(!is_dir(public_path('/img/charters/'))){
                    mikdir( public_path('/img/charters/'),0777 );
                }else{
                    if($request->hasFile('img')){
                        $img=$request->img;
                        $base_name= Str::random();
                        $original= $base_name . '.' . $img->getClientOriginalExtension();

                        $img->move(public_path('/img/charters/'),$original);

                        $charter->update([
                            'name' => $request['name'],
                            'img' => '/img/charters/' . $original,
                            'description' => $request['description'],
                            'max_anglers' => $request['max_anglers'],
                            'feets' => $request['feets'],
                        ]);


                        return response()->json(
                            [
                                'action'=>'success',
                                'charter_id'=>$charter->id,
                                'charter_name'=>$charter->name,
                                'charter_img'=>$charter->img
                            ]
                        );
                    }else{
                        $charter->update([
                            'name' => $request['name'],
                            'description' => $request['description'],
                            'max_anglers' => $request['max_anglers'],
                            'feets' => $request['feets'],
                        ]);


                        return response()->json(
                            [
                                'action'=>'success',
                                'charter_id'=>$charter->id,
                                'charter_name'=>$charter->name,
                                'charter_img'=>$charter->img
                            ]
                        );
                    }
                }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $charter=Charter::findOrfail($id);
        $title=$charter->name;
        $charter->delete();
        return back()->with('message','Lancha '.$title. ' eliminada!')->with('typealert','danger')->with('display','d-flex');;
    }
}
