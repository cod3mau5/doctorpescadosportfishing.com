<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\BoatSpecification;
use Validator;

class BoatSpecificationsController extends Controller
{
    // AUN NO LO SE
    // public function index()
    // {
    //     //
    // }

    // AUN NO LO SE
    // public function create()
    // {
    //     //
    // }

    // ESTE SI (POR AHORA)
    public function store(Request $request)
    {

        // validator
        if(empty($request->fishing_gear) || empty($request->boat_features)){
            if(empty($request->fishing_gear) && !empty($request->boat_features)){
                return response()->json([
                    'fishing_gear'=>'No se a agregado equipo de pesca.',
                ]);
            }elseif(!empty($request->fishing_gear) && empty($request->boat_features)){
                return response()->json([
                    'boat_features'=>'No se a agregado las caracteristicas del bote.',
                ]);
            }else{
                return response()->json([
                    'fishing_gear'=>'No se a agregado equipo de pesca.',
                    'boat_features'=> 'No se a agregado las caracteristicas del bote.'
                ]);
            }
        }
        $rules=[
            'fishing_gear'=>'required',
            'boat_features'=>'required',
        ];
        $messages=[
            'fishing_gear.required'=>'El equipo de pesca es requerido.',
            'boat_features.required'=>'Se requere ingresar las caracteristicas del bote.',
        ];


        $fishing_gear= implode(',',$request->fishing_gear);
        $boat_features= implode(',',$request->boat_features);


        $validator= Validator::make($request->all(), $rules,$messages);

        if($validator->fails()){
            return response()->json($validator->errors());
        }else{
            if(
                $specifications=BoatSpecification::create([
                    'fishing_gear'  => $fishing_gear,
                    'boat_features' => $boat_features,
                    'panga_id'      =>  $request->panga_id,
                    'charter_id'      =>  $request->charter_id,
                ])
            ){
                return response()->json(['action'=>'success',]);
            }
        }
    }

    // AUN NO LO SE
    // public function show($id)
    // {
    //     //
    // }


    public function update(Request $request, $id)
    {
         //validator
         if(empty($request->fishing_gear) || empty($request->boat_features)){
            if(empty($request->fishing_gear) && !empty($request->boat_features)){
                return response()->json([
                    'fishing_gear'=>'No se a agregado equipo de pesca.',
                ]);
            }elseif(!empty($request->fishing_gear) && empty($request->boat_features)){
                return response()->json([
                    'boat_features'=>'No se a agregado las caracteristicas del bote.',
                ]);
            }else{
                return response()->json([
                    'fishing_gear'=>'No se a agregado equipo de pesca.',
                    'boat_features'=> 'No se a agregado las caracteristicas del bote.'
                ]);
            }
        }

        // if validator don't  return anything
        // we looking for the register
        $boatSpecifiations=BoatSpecification::where('panga_id',$request->panga_id)->first();

        $fishing_gear= implode(',',$request->fishing_gear);
        $boat_features= implode(',',$request->boat_features);

            if(//if the register is updated
                $boatSpecifiations->update([
                    'fishing_gear'  => $fishing_gear,
                    'boat_features' => $boat_features,
                    'panga_id'      =>  $request->panga_id,
                    'charter_id'      =>  $request->charter_id,
                ])
            ){
                return response()->json(['action'=>'success',]);
            }else{//otherwise
                return response()->json(['action'=>'error',]);
            }
    }


    // ESTE SI (POR AHORA)
    public function updateCharter(Request $request, $id)
    {
        //validator
        if(empty($request->fishing_gear) || empty($request->boat_features)){
            if(empty($request->fishing_gear) && !empty($request->boat_features)){
                return response()->json([
                    'fishing_gear'=>'No se a agregado equipo de pesca.',
                ]);
            }elseif(!empty($request->fishing_gear) && empty($request->boat_features)){
                return response()->json([
                    'boat_features'=>'No se a agregado las caracteristicas del bote.',
                ]);
            }else{
                return response()->json([
                    'fishing_gear'=>'No se a agregado equipo de pesca.',
                    'boat_features'=> 'No se a agregado las caracteristicas del bote.'
                ]);
            }
        }

        // if validator don't  return anything
        // we looking for the register
        $boatSpecifiations=BoatSpecification::where('charter_id',$request->charter_id)->first();

        $fishing_gear= implode(',',$request->fishing_gear);
        $boat_features= implode(',',$request->boat_features);

            if(//if the register is updated
                $boatSpecifiations->update([
                    'fishing_gear'  => $fishing_gear,
                    'boat_features' => $boat_features,
                    'panga_id'      =>  $request->panga_id,
                    'charter_id'      =>  $request->charter_id,
                ])
            ){
                return response()->json(['action'=>'success',]);
            }else{//otherwise
                return response()->json(['action'=>'error',]);
            }
    }

    // ESTE SI (POR AHORA)
    public function destroy($id)
    {
        //
    }
}
