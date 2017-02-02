<?php
class Estate extends Eloquent{
    protected $table = 'estates';
    const TABLE_NAME = 'estates';
    public static function findByPlaceId($place_id)
    {
        return Estate::where('place_id', '=', $place_id)->first();
    }
    
}