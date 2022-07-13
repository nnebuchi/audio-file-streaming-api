<?php

namespace app\Services;
use App\Models\AudioFile;

class FileService{

    public static function getFiles($request){
        $files = AudioFile::where('visible', '1');
        if($request->publisher_id){

            $files->where('creator_id', sanitize_input($request->publisher_id));
        }
        if($request->publishers){
            $files->whereIn('creator_id', $request->publishers);
        }
        if($request->sort && $request->sort == 'asc'){
            $files->orderBy('created_at', 'asc');
        }

        if($request->latest){
            $files->latest();
        }
        return json_encode([
            'status'    => 'success',
            'data'  => $files->paginate(50),
        ]);
    }
    
}
