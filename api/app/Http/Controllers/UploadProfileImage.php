<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\File;
class UploadProfileImage extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => ['required','image:jpg,jpeg,png',]
        ]);

        if ($request->hasFile('image')){
             $oldImage= $request->user()->image;
            if(!is_null($oldImage)){
                $deleteOldImage = @unlink("/app/storage/app/" . $oldImage); //if not null -> delete old //if image not exist physically ignore exception
                $newImage = $request ->file('image');
                $newImagePath = $newImage->store('profile');
                $image = ['image' => $newImagePath];
                $user = $request->user()->forceFill($image);
                $user->save();
                return response($user,200);
            }else{
                $newImage = $request ->file('image');
                $newImagePath = $newImage->store('profile');
                $image = ['image' => $newImagePath];
                $user = $request->user()->forceFill($image);
                $user->save();
                return response($user,200);
            }

        }else{
            return response('the image was not loaded',403);
        }
    }
}
