<?php
namespace App\Services;
use App\Models\Creator;

class PublisherService{
    public static function get(){
        // $publishers = Creator::all();
        return json_encode([
            'status'    => 'success',
            'message'   => 'publishers fetched successfully',
            'data'      =>  Creator::all()
        ]);
    }

    public static function select(array $publishers_ids){
        $publishers = $publishers_ids;
        return json_encode([
            'status'    => 'success',
            'message'   => 'publishers selection successful',
            "data"      =>  $publishers
        ]);
    }
}