<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Captain;
use Validator,Str,Config,Image;

class CaptainInfoController extends Controller
{

    // public function index()
    // {
    //     //
    // }


    // public function create()
    // {
    //     //
    // }


    public function store(Request $request)
    {

        $rules=[
            'captain_img'=>'required',
            'captain_img'=>'mimes:jpeg,bmp,png|max:91872749',
            'captain_name'=> 'required',
            'captain_experience'=>'required',
            'captain_origin'=>'required',
        ];

        $messages=[
            'captain_img.required'=>'La imagen destacada es requerida.',
            'captain_img.mimes'=>'El archivo que cargaste no es una imagen valida.',
            'captain_name.required'=>'Se requiere ingresar un nombre para la panga.',
            'captain_experience.required'=>'Se requiere ingresar la experiencia del capitan.',
            'captain_origin.required'=>'Se requiere ingresa el lugar de nacimiento del capitan',
        ];

        $validator= Validator::make($request->all(), $rules,$messages);


        if($validator->fails()){

            return response()->json($validator->errors());

        }else{

            $path= '/'.date('Y-m-d');
            $fileExt= trim($request->captain_img->getClientOriginalExtension());
            $uploadPath=Config::get('filesystems.disks.uploads.root');
            $name=Str::slug(str_replace($fileExt,'',$request->captain_img->getClientOriginalName()));

            $fileName= rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file=$uploadPath.'/'.$path.'/'.$fileName;

            // dd($file_file);


                if(!is_dir(public_path('/img/captains/'))){
                    mikdir( public_path('/img/captains/'),0777 );
                }else{
                    if($request->hasFile('captain_img')){
                        // return $request->all();
                        $img=$request->captain_img;
                        $base_name= Str::random();
                        $original= $base_name . '.' . $img->getClientOriginalExtension();

                        $img->move(public_path('/img/captains/'),$original);

                        $captain=Captain::create([
                            'captain_img' => '/img/captains/' . $original,
                            'name' => $request['captain_name'],
                            'origin' => $request['captain_origin'],
                            'experience' => $request['captain_experience'],
                            'favorite_fish' => $request['favorite_fish'],
                            'reason_to_fish' => $request['reason_to_fish'],
                            'hobby' => $request['hobby'],
                            'panga_id' => $request['panga_id'],
                            'charter_id'=> $request['charter_id']
                        ]);


                        return response()->json(
                            [
                                'action'=>'success',
                                'captain_id'=>$captain->id,
                                'captain_name'=>$captain->name,
                                'captain_img'=>$captain->captain_img
                            ]
                        );
                    }
                }

        }


    }


    // public function show($id)
    // {

    // }


    // public function edit($id)
    // {
    //     //
    // }


    public function update(Request $request, $id)
    {
        $captain= Captain::where('panga_id',$request->panga_id)->first();
        if(empty($captain->captain_img) && empty($request->captain_img)){
            return response()->json(['captain_img'=>'al parecer no hay imagen del capitan, por favor suba una imagen.']);
        }
        $rules=[
            'captain_img'=>'mimes:jpeg,bmp,png|max:91872749',
            'captain_name'=> 'required',
            'captain_experience'=>'required',
            'captain_origin'=>'required',
        ];

        $messages=[
            'captain_img.mimes'=>'El archivo que cargaste no es una imagen valida.',
            'captain_name.required'=>'Se requiere ingresar un nombre para la panga.',
            'captain_experience.required'=>'Se requiere ingresar la experiencia del capitan.',
            'captain_origin.required'=>'Se requiere ingresa el lugar de nacimiento del capitan',
        ];

        $validator= Validator::make($request->all(), $rules,$messages);


        if($validator->fails()){

            return response()->json($validator->errors());

        }else{
            $captain= Captain::where('panga_id',$request->panga_id)->first();
            $path= '/'.date('Y-m-d');
            $fileExt= trim($request->captain_img->getClientOriginalExtension());
            $uploadPath=Config::get('filesystems.disks.uploads.root');
            $name=Str::slug(str_replace($fileExt,'',$request->captain_img->getClientOriginalName()));

            $fileName= rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file=$uploadPath.'/'.$path.'/'.$fileName;

            if(!is_dir(public_path('/img/captains/'))){
                mikdir( public_path('/img/captains/'),0777 );
            }else{
                if($request->hasFile('captain_img')){
                    // return $request->all();
                    $img=$request->captain_img;
                    $base_name= Str::random();
                    $original= $base_name . '.' . $img->getClientOriginalExtension();

                    $img->move(public_path('/img/captains/'),$original);

                    $captain->update([
                        'captain_img' => '/img/captains/' . $original,
                        'name' => $request['captain_name'],
                        'origin' => $request['captain_origin'],
                        'experience' => $request['captain_experience'],
                        'favorite_fish' => $request['favorite_fish'],
                        'reason_to_fish' => $request['reason_to_fish'],
                        'hobby' => $request['hobby'],
                        'panga_id' => $request['panga_id'],
                        'charter_id'=> $request['charter_id']
                    ]);


                    return response()->json(
                        [
                            'action'=>'success',
                            'captain_id'=>$captain->id,
                            'captain_name'=>$captain->name,
                            'captain_img'=>'/img/captains/' . $original
                        ]
                    );
                }
            }

        }
    }

    public function updateCharter(Request $request, $id)
    {
        $captain= Captain::where('charter_id',$request->charter_id)->first();
        if(empty($captain->captain_img) && empty($request->captain_img)){
            return response()->json(['captain_img'=>'al parecer no hay imagen del capitan, por favor suba una imagen.']);
        }
        // dd($request->all());
        if(!empty($request->captain_img)){
            $rules=[
                'captain_img'=>'mimes:jpeg,bmp,png|max:91872749',
                'captain_name'=> 'required',
                'captain_experience'=>'required',
                'captain_origin'=>'required',
            ];
        }else{
            $rules=[
                'captain_name'=> 'required',
                'captain_experience'=>'required',
                'captain_origin'=>'required',
            ];
        }


        $messages=[
            'captain_img.mimes'=>'El archivo que cargaste no es una imagen valida.',
            'captain_name.required'=>'Se requiere ingresar un nombre para la panga.',
            'captain_experience.required'=>'Se requiere ingresar la experiencia del capitan.',
            'captain_origin.required'=>'Se requiere ingresa el lugar de nacimiento del capitan',
        ];

        $validator= Validator::make($request->all(), $rules,$messages);


        if($validator->fails()){

            return response()->json($validator->errors());

        }elseif($request->img == null){
            $captain= Captain::where('charter_id',$request->charter_id)->first();
            $captain->update([
                'name' => $request['captain_name'],
                'origin' => $request['captain_origin'],
                'experience' => $request['captain_experience'],
                'favorite_fish' => $request['favorite_fish'],
                'reason_to_fish' => $request['reason_to_fish'],
                'hobby' => $request['hobby'],
                'panga_id' => $request['panga_id'],
                'charter_id'=> $request['charter_id']
            ]);
            return response()->json(
                [
                    'action'=>'success',
                    'captain_id'=>$captain->id,
                    'captain_name'=>$captain->name,
                    'captain_img'=>$captain->captain_img
                ]
            );

        }else{
            $captain= Captain::where('charter_id',$request->charter_id)->first();
            $path= '/'.date('Y-m-d');
            $fileExt= trim($request->captain_img->getClientOriginalExtension());
            $uploadPath=Config::get('filesystems.disks.uploads.root');
            $name=Str::slug(str_replace($fileExt,'',$request->captain_img->getClientOriginalName()));

            $fileName= rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file=$uploadPath.'/'.$path.'/'.$fileName;

            if(!is_dir(public_path('/img/captains/'))){
                mikdir( public_path('/img/captains/'),0777 );
            }else{
                if($request->hasFile('captain_img')){
                    // return $request->all();
                    $img=$request->captain_img;
                    $base_name= Str::random();
                    $original= $base_name . '.' . $img->getClientOriginalExtension();

                    $img->move(public_path('/img/captains/'),$original);

                    $captain->update([
                        'captain_img' => '/img/captains/' . $original,
                        'name' => $request['captain_name'],
                        'origin' => $request['captain_origin'],
                        'experience' => $request['captain_experience'],
                        'favorite_fish' => $request['favorite_fish'],
                        'reason_to_fish' => $request['reason_to_fish'],
                        'hobby' => $request['hobby'],
                        'panga_id' => $request['panga_id'],
                        'charter_id'=> $request['charter_id']
                    ]);


                    return response()->json(
                        [
                            'action'=>'success',
                            'captain_id'=>$captain->id,
                            'captain_name'=>$captain->name,
                            'captain_img'=>'/img/captains/' . $original
                        ]
                    );
                }
            }

        }
    }
    // public function destroy($id)
    // {
    //     //
    // }
}
