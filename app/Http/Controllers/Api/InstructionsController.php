<?php

namespace App\Http\Controllers\Api;

use App\Models\Instruction;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreinstructionsRequest;
use App\Http\Requests\UpdateinstructionsRequest;

class InstructionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructions = Instruction::query()->paginate(10);
         if($instructions -> count() > 0){
            $data = [
                'status' => 200,
                'data' => $instructions
            ];
            return response()->json($data, 200);
         }else{
             $data = [
            'status' => 404,
            'data' => 'No Instruction found!.'
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
    public function store(StoreinstructionsRequest $request)
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
            $instructions = Instruction::create([
            'name' => $request->name,
            ]);


            if($instructions){
            return response()->json([
                'status'=>200,
                'data'=>'Instruction Added Successfully'
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
    public function show(instructions $instructions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(instructions $instructions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateinstructionsRequest $request, instructions $instructions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(instructions $instructions)
    {
        //
    }
}
