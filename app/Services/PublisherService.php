<?php
namespace App\Services;
use App\Models\Creator;
use App\Models\Listen;
use App\Models\User;

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
        $listens = Listen::select('audio_file_id', 'user_id')
                    ->groupBy('audio_file_id')
                    ->get();
        return json_encode([
            'status'    => 'success',
            'message'   => 'publishers selection successful',
            "data"      =>  $listens

        ]);
    }
}