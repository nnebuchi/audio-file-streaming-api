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
    public static function get($request){
        // $publishers = Creator::all();
        return json_encode([
            'status'    => 'success',
            'message'   => 'publishers fetched successfully',
            'data'      =>  Creator::all(),
            'users_publishers_ids'=>$request->user()->publisers_ids
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

    public static function toggleFollow(string $publisher_id, string $user_id){
            // $user = User::where('id', $user_id)->first();
            // $user->publishers_ids = $publishers_ids;
            // $user->save();
            // return json_encode([
            //     'status'    => 'success',
            //     'message'   => 'publishers selection successful',
            //     "data"      =>  $user->publishers_ids
            // ]);


            // if(!$user){
            //     return json_encode([
            //         'status'    =>'fail',
            //         'message'   =>'User not found',
            //         'error'      =>'unathorised access'
            //     ]);
            // }
            $user = User::where('id', $user_id)->first();
            // retrieve existing favoutites and explode it
            $publishersPick = json_decode($user->publishers_ids, true);
    
            if(in_array($publisher_id, $publishersPick)){
                $key = array_search($publisher_id, $publishersPick);
                unset($publishersPick[$key]);
            }else{
                array_push($publishersPick, $publisher_id);
            }
    
            $user->publishers_ids = $publishersPick;
    
            $user->save();
    
            return json_encode([
                'status'        => 'success',
                'message'       => 'success',
                'followings'    => $user->publishers_ids
            ]);
        }
    public static function getTrendingPublishers(){
        //  This endpoint needs to be modified to tech based on specific date range
        $pubs = Creator::select('id', 'firstname', 'lastname', 'profile_pic', 'cover_photo', 'public_name', 'about_ministry')->withCount('listens')->orderByDesc('listens_count');


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