<?php
namespace App\Services;
use App\Models\Creator;
use App\Models\Listen;
use App\Models\User;
use App\Models\AudioFile;
use Illuminate\Support\Carbon;

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

        $pubs = Creator::select('firstname', 'lastname', 'profile_pic', 'logo', 'public_name')->withCount('listens')->orderByDesc('listens_count');

        return json_encode([
            'status'    => 'success',
            'message'   => 'publishers selection successful',
            "data"      =>  $pubs->paginate(10)

        ]);
    }
}