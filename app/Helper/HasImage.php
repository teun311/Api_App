<?php


namespace App\Helper;


use Illuminate\Support\Facades\Storage;

trait HasImage
{

    //{{asset(Auth::user()->image}}
    //{{Storage::url(Auth::user()->image)}}




    public function publicImageUpload(array $request)
    {
        if ($request->hasFile('image')){
            // $image = $request->file('image')->store('public');
            $image = Storage::disk('public')->put('/',$request->file('image'));
        }

        return $image;
    }

    public function LocalImageUpload(array $request)
    {
        if ($request->hasFile('image')){
            // $image = $request->file('image')->store('public');
            $image = Storage::disk('local')->put('/',$request->file('image'));
        }

        return $image;
    }
    public function downLoad(){
        if ($this->condition){
            return Storage::disk('local')->download(auth()->user()->cv);
        }
    }
}
