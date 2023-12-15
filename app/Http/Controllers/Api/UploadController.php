<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class UploadControllerImani extends Controller
{
    function upload(Request $request)
    {
        $image = $request->file("file");
        if ($request->hasFile("file")) {
            $imagePath = base_path().'/../public_html/uploads/imani/images/';
            $new_name = rand() . $image->getClientOriginalName();
            $image->move($imagePath, $new_name);
            return response()->json('https://database.co.tz/uploads/imani/images/' . $new_name);
        } else {
            return response()->json('image null');
        }
    }
}
