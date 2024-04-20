<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['images'] = ImageUpload::all();
        return view('image-upload', $data);
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

    /**
     * Display the specified resource.
     */
    public function show(ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImageUpload $imageUpload)
    {
        //
    }
}
