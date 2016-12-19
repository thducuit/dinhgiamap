<?php
class Result extends Eloquent{
	protected $table = 'results';
	protected $fillable = array('name', 'place_id', 'unit_price', 'building_price', 'buidingPriceMore', 'total_price', 'total');
}