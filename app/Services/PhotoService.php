<?php

namespace App\Services;

use App\Photo;
use Illuminate\Http\Request;
use Storage;

class PhotoService
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pet_id)
    {
        //
        if($request['images'] != null){
            $files = $request->file('images');

            foreach ($files as $file){
                $fname = $file->getClientOriginalName();

                Photo::create([
                    'path' => Storage::disk('public')->putFileAs('pets/'.$request['pet_id'], $file, $fname),
                    'pet_id' => $request->pet_id
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($photo_id, $pet_id)
    {
        //
        Photo::find($photo_id);
        $this->authorize('isOwner', $photo);
        Storage::disk('public')->delete($photo->path);
        $photo->delete();
    }
}
