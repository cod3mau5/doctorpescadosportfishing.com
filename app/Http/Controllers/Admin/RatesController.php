<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rate;
use Validator;

class RatesController extends Controller
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
        $request['default_half_day_description']='Vessel, fuel, tackle & crew.';
        $request['default_full_day_description']='Vessel, fuel, tackle & crew.';
        $data= $request->except('_token');

        $rules=[
            'half_day'=>'required',
            'duration_half_day'=>'required',
            'half_day_description'=> 'required',
            'full_day'=>'required',
            'duration_full_day'=>'required',
            'full_day_description'=>'required',
        ];
        $messages=[
            'half_day.required'=>'El precio de medio dia es requerido.',
            'duration_half_day.required'=>'Se requere ingresar la duracion del medio dia.',
            'half_day_description.required'=>'Se requiere la descripcion del medio dia.',
            'full_day.required'=>'El precio del dia completo es requerido.',
            'duration_full_day.required'=>'Se requere ingresar la duracion del dia completo.',
            'full_day_description.required'=>'Se requiere la descripcion del dia completo',
        ];

        $validator= Validator::make($request->all(), $rules,$messages);
        if($validator->fails()){
            return response()->json($validator->errors());
        }else{
            $rate= Rate::create($data);
            return response()->json(
                [
                    'action'=>'success',
                    'duration_full_day'=>$rate->duration_full_day,
                    'duration_half_day'=>$rate->duration_half_day,
                    'full_day'=>$rate->full_day,
                    'half_day'=>$rate->half_day,
                    'full_day_description'=>$rate->full_day_description,
                    'half_day_description'=>$rate->half_day_description
                ]
            );
        }

        return $rate;
    }


    // public function show($id)
    // {
    //     //
    // }

    // public function edit($id)
    // {
    //     //
    // }


    public function update(Request $request, $id)
    {
        $request['default_half_day_description']='Vessel, fuel, tackle & crew.';
        $request['default_full_day_description']='Vessel, fuel, tackle & crew.';
        $data= $request->except('_token');

        $rules=[
            'half_day'=>'required',
            'duration_half_day'=>'required',
            'half_day_description'=> 'required',
            'full_day'=>'required',
            'duration_full_day'=>'required',
            'full_day_description'=>'required',
        ];
        $messages=[
            'half_day.required'=>'El precio de medio dia es requerido.',
            'duration_half_day.required'=>'Se requere ingresar la duracion del medio dia.',
            'half_day_description.required'=>'Se requiere la descripcion del medio dia.',
            'full_day.required'=>'El precio del dia completo es requerido.',
            'duration_full_day.required'=>'Se requere ingresar la duracion del dia completo.',
            'full_day_description.required'=>'Se requiere la descripcion del dia completo',
        ];

        $validator= Validator::make($request->all(), $rules,$messages);
        if($validator->fails()){
            return response()->json($validator->errors());
        }else{

            if(!empty($request->panga_id)){
                $rate= Rate::where('panga_id',$request->panga_id)->first();
                $rate->update($data);
                return response()->json(
                    [
                        'action'=>'success',
                        'duration_full_day'=>$rate->duration_full_day,
                        'duration_half_day'=>$rate->duration_half_day,
                        'full_day'=>$rate->full_day,
                        'half_day'=>$rate->half_day,
                        'full_day_description'=>$rate->full_day_description,
                        'half_day_description'=>$rate->half_day_description
                    ]
                );
            }elseif(!empty($request->charter_id)){
                $rate= Rate::where('charter_id',$request->charter_id)->first();
                // dd($data);
                $rate->update($data);
                // return $rate;
                return response()->json(
                    [
                        'action'=>'success',
                        'duration_full_day'=>$rate->duration_full_day,
                        'duration_half_day'=>$rate->duration_half_day,
                        'full_day'=>$rate->full_day,
                        'half_day'=>$rate->half_day,
                        'full_day_description'=>$rate->full_day_description,
                        'half_day_description'=>$rate->half_day_description
                    ]
                );
            }


        }

        return $rate;
    }

    // public function destroy($id)
    // {
    //     //
    // }
}
