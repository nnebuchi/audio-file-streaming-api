<?php

namespace app\Services;
use App\Models\AudioFile;
use App\Models\Listen;
use Illuminate\Support\Facades\Response;

class FileService{

    public static function getFiles($request){

        $files = AudioFile::select('title','file')::with('creator')->where('visible', '1');

        if($request->publisher_id){

            $files = $files->where('creator_id', sanitize_input($request->publisher_id));
            
        }
        if($request->publishers){
            $files = $files->whereIn('creator_id', $request->publishers);
            
        }
        if($request->sort && $request->sort == 'asc'){
            $files = $files->orderBy('created_at', 'asc');
        }

        if($request->latest){
            $files =$files->latest();
        }
        
        $files = $request->publishers ? $files->inRandomOrder()->limit(50)->get() : $files->paginate(50);
        
        return Response::json([
            'status'    => 'success',
            'data'  => $files,
        ], 200);
    }

    public static function getSingleFile($request){
        $file = AudioFile::where('slug', sanitize_input($request->slug))->first();
        if($file){
            $listen = new Listen;
            $listen->audio_file_id = $file->id;
            $listen->user_id       = $request->user()->id;
            $listen->save();

            return json_encode([
                'status'    =>'success',
                'message'   =>'File fetched',
                'data'      =>$file
            ]);
        }

        return json_encode([
            'status'    =>'fail',
            'message'   =>'File not found',
            'error'      =>'file not found'
        ]);
    }
    
}
