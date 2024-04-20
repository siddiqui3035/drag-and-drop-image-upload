<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function index()
    {
        $data['images'] = ImageUpload::all();
        return view('image-upload', $data);
    }

    public function store(Request $request)
    {
        // Initialize an array to store image information
        $images = [];

        // Process each uploaded image
        foreach($request->file('files') as $image) {
            // Generate a unique name for the image
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Move the image to the desired location
            $image->move(public_path('images'), $imageName);

            // Add image information to the array
            $images[] = [
                'name' => $imageName,
                'path' => asset('/images/'. $imageName),
                'filesize' => filesize(public_path('images/'.$imageName))
            ];
        }

        // Store images in the database using create method
        foreach ($images as $imageData) {
            ImageUpload::create($imageData);
        }

        return response()->json(['success'=>$images]);

    }
}
