<?php
namespace App\Services;
use App\Models\Creator;
use App\Models\Listen;
use App\Models\User;
use App\Models\AudioFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class PublisherService{
    public static function get(){
        // $publishers = Creator::all();
        return json_encode([
            'status'    => 'success',
            'message'   => 'publishers fetched successfully',
            'data'      =>  Creator::all()
        ]);
    }

    public static function select(array $publishers_ids, string $user_id){
        $user = User::where('id', $user_id)->first();
        $user->publishers_ids = $publishers_ids;
        $user->save();
        return json_encode([
            'status'    => 'success',
            'message'   => 'publishers selection successful',
            "data"      =>  $user->publishers_ids
        ]);
    }

    public static function getTrendingPublishers(){
        //  This endpoint needs to be modified to tech based on specific date range
        $pubs = Creator::select('id', 'firstname', 'lastname', 'profile_pic', 'cover_photo', 'public_name', 'about_minister')->withCount('listens')->orderByDesc('listens_count');


        return Response::json([
            'status'    => 'success',
            'message'   => 'publishers selection successful',
            "data"      =>  $pubs->paginate(10)

        ], 200);
    }

    public static function getPublisherData($request){
        $publisher = Creator::where('id', sanitize_input($request->id))
        ->with('latest_release');

        return Response::json([
            'status'    => 'success',
            'message'   => 'publishers data fetched',
            "data"      =>  $publisher->first()
        ], 200);
    }
}