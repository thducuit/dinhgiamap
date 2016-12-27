<?php
namespace Ducnguyen\Storage\Price;

use Marker;
use Street;

class Price implements PriceRepository
{
    private function getMarker($place_id)
    {
        return Marker::findByPlaceId($place_id);
    }

    private function getStreet($id = 0)
    {
        return Street::find($id);
    }
    
    public function result($input)
    {
        $type = $input['type'];        
		switch ($type)
		{
			case 'vacant_land':
				return $this->calc($input);
				break;
			default:
				return $this->calc($input, $construction = true);
		}	
    }
    
    
    public function getUnitPriceAfterConfig($price, $shape_persent)
    {
        return $price  + ( $price * $shape_persent ) / 100;
    }
    
    public function getPriceInPlan($unit_price, $leaving_area, $trade_area, $production_area, $farming_area)
    {
        return ($unit_price * $leaving_area) + (80 * $unit_price * $trade_area) / 100 + (60 * $unit_price * $production_area) / 100 + (40 * $unit_price * $farming_area) / 100;
    }
    
    public function getPriceInViolance($unit_price, $unit_state_price, $leaving_area, $trade_area, $production_area, $farming_area)
    {
        return (70 * $unit_price * $leaving_area) / 100 + (80 * $unit_state_price * $trade_area) / 100 + (60 * $unit_state_price * $production_area) / 100 + (130000 * $farming_area);
    }
    
    public function getPriceConstruction($structure, $total_ground_area, $year_building)
    {
        return $structure * $total_ground_area * $year_building / 100;
    }
    
    public function total($price_in_plan, $price_in_violance) 
    {
        return $price_in_plan + $price_in_violance;
    }
    
    public function calc($input, $hasConstruction=false) 
    {
        $finalTotal = 0;
        $marker = $this->getMarker($input['place_id']);
        $street = $this->getStreet($input['street_id']);
        $name = !empty($marker) ? $marker->name : $input['address'];
        $unit_price = 0;
        $unit_state_price = 0;
        if( empty($marker) ) {
            if( !empty($street) )
            {
                $unit_price = $street->price;
                $unit_state_price = $street->state_price;
            }
        }
        else 
        {
            $unit_price = $marker->price;
            $unit_state_price = $marker->state_price;
        }
        
        $shape_persent = $input['shape'];
        $leaving_plan_area = $input['leaving_plan_area'];
        $trade_plan_area = ($input['trade_plan_area'])?$input['trade_plan_area']:0;
        $production_plan_area = ($input['production_plan_area'])?$input['production_plan_area']:0;
        $farming_plan_area = ($input['farming_plan_area'])?$input['farming_plan_area']:0;
        $leaving_violance_area = ($input['leaving_violance_area'])?$input['leaving_violance_area']:0;
        $trade_violance_area = ($input['trade_violance_area'])?$input['trade_violance_area']:0;
        $production_violance_area = ($input['production_violance_area'])?$input['production_violance_area']:0;
        $farming_violance_area = ($input['farming_violance_area'])?$input['farming_violance_area']:0;
        $total_area = $input['total_area'];
        
//        $unit_price = $this->getUnitPriceAfterConfig($unit_price, $shape_persent);
        $yeuToKhac = 0;
        foreach($input['yeuToKhac'] as $item){
          $yeuToKhac += $item*1;
        }
        
        $unit_price = $unit_price*1 + $unit_price*($input['viTri'] + $input['hinhDangThuaDat'] + $yeuToKhac + $input['chieuNgang']  + $input['dienTichDat'])/100;        
        $price_in_plan = $this->getPriceInPlan($unit_price, $leaving_plan_area, $trade_plan_area, $production_plan_area, $farming_plan_area);
        $price_in_violance = $this->getPriceInViolance($unit_price, $unit_state_price, $leaving_violance_area, $trade_violance_area, $production_violance_area, $farming_violance_area);
       
        
        $total = $this->total($price_in_plan, $price_in_violance);
        $finalTotal += $total;
        $construction =   0;
        $constructionMore =   [];
        if($hasConstruction)
        {
            $structure = $input['structure'];
            $total_ground_area = $input['total_ground_area'];
            $year_building = $input['year_building'];
            $construction =  $this->getPriceConstruction($structure, $total_ground_area, $year_building);
            $finalTotal+=$construction;
            if(isset($input['structureMore']) && count($input['structureMore'])){
              foreach($input['structureMore'] as $key => $value){
                $constructionPriceMore = $this->getPriceConstruction($value, $input['total_ground_area_more'][$key], $input['year_building_more'][$key]);
                $constructionMore[] = number_format($constructionPriceMore, null, null, '.');
                $finalTotal += $constructionPriceMore;
              }
            }
        }        
        
        return array(
                'name'=> $name,
                'total_price' => number_format($total, null, null, '.'),
                'unit_price'=> number_format($unit_price, null, null, '.'),
                'unit_state_price'=> number_format($unit_state_price, null, null, '.'),
                'building_price' => number_format($construction, null, null, '.'),
                'buildingPriceMore' => $constructionMore,
                'total' => number_format($finalTotal, null, null, '.'),
                
            );
        
    }
}