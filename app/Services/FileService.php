<?php

namespace app\Services;
use App\Models\AudioFile;
use App\Models\Listen;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class FileService{

    public static function getFiles($request){
        // $files = AudioFile::select('title','title')::with('creator')->where('visible', '1');
        // $files = AudioFile::select('title', 'file')->where('visible', '1')->with('creator:firstname');
        if($request->tag){
            $tag = Tag::where('name', $request->tag)->first();
            if($tag){
                $files = $tag->audio_files()->select('id', 'slug', 'title', 'file', 'cover_photo', 'creator_id')
                ->with(array('creator'=>function($query){
                    $query->select('id', 'firstname','lastname');
                }));
            }
        }else{
            $files = AudioFile::select('id', 'slug', 'title', 'file', 'cover_photo', 'creator_id')
            ->with(array('creator'=>function($query){
                $query->select('id', 'firstname','lastname');
            }));
        }
        
        // Post::select('id','title','user_id')->with('user:id,username')->get();
        // $files = AudioFile::with(['creator' => function ($query) {
        //     $query->select(['firstname', 'lastname']);
        // }]);

        if($request->publisher_id){
            $files = $files->where('creator_id', sanitize_input($request->publisher_id));
        }

        if($request->publishers && $request->publishers == 'my-pick'){
            
            if(!$request->user()->publishers_ids){
                return Response::json([
                    'status'   => 'fail',
                    'message'  => 'user has no selected publishers',
                    'data'     =>  'No selected publishers'
                ], 200);
            }

            $files = $files->whereIn('creator_id', json_decode($request->user()->publishers_ids));
        }

        if($request->sort){
            $files = $files->orderBy('created_at', $request->sort);
        }

        if($request->randomise){
            $files->inRandomOrder();
        }

        if($request->order_listens){
            $files->withCount('listens')->orderByDesc('listens_count');
        }

        

        // if($request->latest){
        //     $files =$files->latest();
        // }

        
        $files = $request->publishers && $request->randomise ? $files->limit(50)->get() : $files->paginate(50);
        
        return Response::json([
            'status'    => 'success',
            'data'  => $files,
        ], 200);
    }

    public static function getSingleFile($request){
        $file = AudioFile::where('slug', sanitize_input($request->slug))->first();
        
        if($file){

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

    public static function play($request){
        
        $file = AudioFile::where('slug', sanitize_input($request->slug))->first();
        
        if($file){

            $listen = new Listen;
            $listen->audio_file_id = $file->id;
            $listen->user_id       = $request->user()->id;
            $listen->save();
            
            return json_encode([
                'status'    =>'success',
                'message'   =>'Playing',
            ]);
        }
        
        return json_encode([
            'status'    =>'fail',
            'message'   =>'File not found',
            'error'      =>'file not found'
        ]);
    }
    

    public static function toggleFavourites(String $slug, String $user_id){

        $user = User::where('id', $user_id)->first();

        if(!$user){
            return json_encode([
                'status'    =>'fail',
                'message'   =>'User not found',
                'error'      =>'unathorised access'
            ]);
        }

        // retrieve existing favoutites and explode it
        $userFavourites = json_decode($user->favourites, true);

        if(in_array($slug, $userFavourites)){
            $key = array_search($slug, $userFavourites);
            unset($userFavourites[$key]);
        }else{
            array_push($userFavourites, $slug);
        }

        $user->favourites = $userFavourites;

        $user->save();

        return json_encode([
            'status'        =>'success',
            'message'       =>'Favourites updated',
            'favourites'    =>$user->favourites
        ]);
    }
}
