<?php

namespace App\Http\Controllers\Api;

use App\Models\Exercise;
use App\Models\Instruction;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreexercisesRequest;
use App\Http\Requests\UpdateexercisesRequest;

class ExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       

    $exercises = Exercise::with(['inst','muscle','bodyPart'])->paginate(10);


            
         if($exercises -> count() > 0){
            $data = [
                        'status' => 200,
                        'data' => $exercises
                    ];
            return response()->json($data, 200);
         }else{
             $data = [
            'status' => 404,
            'data' => 'No excercise found!.'
         ];
            return response()->json($data, 404);
         }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreexercisesRequest $request)
    {
        //
        $validator =  Validator::make($request->all(), [
            'equipment' => 'string',
            'gifUrl' => 'string',
            'name' => 'required|string',
            //'target' => 'string',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->messages()
            ], 422);
        }else{
            $exercises = Exercise::create([
            'bodypart_id' => $request->bodypart_id,
            'equipment' => $request->equipment,
            'gifUrl' => $request->gifUrl,
            'name' => $request->name,
            //'target' => $request->target,
            //'instruction' => $request->instruction,
            //'secondaryMuscles' => $request->secondaryMuscles,
            ]);


            if($exercises){
            return response()->json([
                'status'=>200,
                'data'=>'Excercise Created Successfully'
            ], 200);
            }else{
            return response()->json([
                'status'=>500,
                'data'=>'Something Went Wrong'
            ], 200);
            }

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(exercises $exercises)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(exercises $exercises)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateexercisesRequest $request, exercises $exercises)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(exercises $exercises)
    {
        //
    }
}
