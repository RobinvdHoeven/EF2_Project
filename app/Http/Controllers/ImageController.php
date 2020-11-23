<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create()
    {
        $images = Image::all();

        return view('upload', compact('images'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'image' => ['required', 'mimes:jpeg,bmp,png,gif,svg'],
        ]);

        if (isset($request->image)) {
            $filepath = $request->file('image')->store('images');

            $image = new Image();
            $image->name = basename($filepath);
            $image->file_path = basename($filepath);
            $image->save();
        }


        return redirect('/images');
    }

    public function show($id)
    {

        $image = Image::where('id', $id)->firstOrFail();

        return view('show', compact('image'));
    }

    public function delete($id)
    {
        $image = Image::where('id', $id)->firstOrFail();
        $image->delete();

        return redirect('/images');
    }

    public function rotateLeft(Request $request)
    {
        $id = $request->input('id');

        $image = Image::where('id', $id)->firstOrFail();
        $image->angle += 90;
        $image->save();
    }

    public function rotateRight(Request $request)
    {
        $id = $request->input('id');

        $image = Image::where('id', $id)->firstOrFail();
        $image->angle -= 90;
        $image->save();
    }
}
