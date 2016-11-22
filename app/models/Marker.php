<?php
class Marker extends Eloquent{
    protected $table = 'markers';
    
    public function street()
    {
        return $this->belongsTo('Street');
    }
    
    public static function findByPlaceId($place_id)
    {
        return Marker::where('place_id', '=', $place_id)->first();
    }

    public function user()
    {
        return $this->hasOne('User');
    }
}