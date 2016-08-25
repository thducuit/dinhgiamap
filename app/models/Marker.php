<?php
class Marker extends Eloquent{
    protected $table = 'markers';
    
    public function street()
    {
        return $this->belongsTo('Street');
    }
}