<?php

namespace App\Http\Controllers\Api;

use App\Models\SecondaryMuscle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoresecondaryMusclesRequest;
use App\Http\Requests\UpdatesecondaryMusclesRequest;

class SecondaryMusclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secondaryMuscles = SecondaryMuscle::query()->paginate(10);
         if($secondaryMuscles -> count() > 0){
            $data = [
                'status' => 200,
                'data' => $secondaryMuscles
            ];
            return response()->json($data, 200);
         }else{
             $data = [
            'status' => 404,
            'data' => 'No Secondary Muscle found!.'
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
    public function store(StoresecondaryMusclesRequest $request)
    {
         $validator =  Validator::make($request->all(), [
         
            'name' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->messages()
            ], 422);
        }else{
            $secondaryMuscles = SecondaryMuscle::create([
                'exercise_id' => $request->exercise_id,
                'name' => $request->name,
            ]);


            if($secondaryMuscles){
            return response()->json([
                'status'=>200,
                'data'=>'Secondary Muscle Added Successfully'
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
    public function show(secondaryMuscles $secondaryMuscles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(secondaryMuscles $secondaryMuscles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesecondaryMusclesRequest $request, secondaryMuscles $secondaryMuscles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(secondaryMuscles $secondaryMuscles)
    {
        //
    }
}
