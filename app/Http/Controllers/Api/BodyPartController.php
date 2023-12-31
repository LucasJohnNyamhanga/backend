<?php

namespace App\Http\Controllers\Api;

use App\Models\BodyPart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorebodyPartRequest;
use App\Http\Requests\UpdatebodyPartRequest;

class BodyPartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $bodyParts = BodyPart::query()->paginate(10);
         if($bodyParts -> count() > 0){
 $data = [
            'status' => 200,
            'data' => $bodyParts
         ];
         return response()->json($data, 200);
         }else{
             $data = [
            'status' => 404,
            'data' => 'No Body Part found!.'
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
    public function store(StorebodyPartRequest $request)
    {
        //
        $validator =  Validator::make($request->all(), [
            'name' => 'string',
            'imgUrl' => 'string',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->messages()
            ], 422);
        }else{
            $body = BodyPart::create([
                'name' => $request->name,
                'imgUrl' => $request->imgUrl,
            ]);


            if($body){
            return response()->json([
                'status'=>200,
                'data'=>'Body Target Created Successfully'
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
    public function show(bodyPart $bodyPart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bodyPart $bodyPart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebodyPartRequest $request, bodyPart $bodyPart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bodyPart $bodyPart)
    {
        //
    }
}
