<?php


namespace App\Models\Traits;


trait Observable
{
    public static function bootObservable(){
       // dd('boot');
        $observer = '\\App\\Observers\\'. class_basename(static::class) . 'Observer';
       // dd($observer);
       if(!class_exists($observer)){
         return;
       }
        (new static())->registerObserver($observer);
    }
}
