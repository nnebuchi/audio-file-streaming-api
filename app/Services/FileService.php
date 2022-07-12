<?php

namespace app\Services;
use App\Models\AudioFile;

class FileService{

    public static function getFiles($request){
        $files = AudioFile::where('visible', '1');
        if($request->publisher_id){

            $files->where('creator_id', sanitize_input($request->publisher_id));
        }
        if($request->has('pulishers')){
            $files->whereIn('creator_id', $request->publishers);
        }

        return json_encode([
            'status'    => 'success',
            'data'  => $files->get(),
        ]);
    }
    
}
