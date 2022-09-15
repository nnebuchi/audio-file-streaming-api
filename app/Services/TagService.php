<?php
namespace App\Services;

use App\Models\Tag;
use Illuminate\Support\Facades\Response;

class TagService{
    public static function getPublisherTags($request){

        $tags = Tag::select('name', 'cover_photo')

        ->whereHas('audio_files', function ($q) use($request) {

            return $q->whereIn('creator_id', $request->user()->id);

        });

        return Response::json([
            "status"    =>  "success",
            "message"   =>  "tags fetched",
            "data"     =>   $tags 
        ], 200);

    }
}