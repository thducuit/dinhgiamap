<?php
class Street extends Eloquent {
    protected $table = 'streets';
    
    public function markers(){
        return $this->hasMany('Marker');
    }

    public function user()
    {
        return $this->hasOne('User');
    }

    public static function getPlanMapId($id) {
        return Street::where('id', '=', $id)->first()->plan_map_id;
    }

    public static function getByDistrict($id) {
        return Street::where('district_id', '=', $id)->get();
    }
    
    public static function getOptions()
    {
        $streets = Street::all();
        $options = array();
        foreach($streets as $d) {
            $options = array_add($options, $d->id, $d->name);
        }
        return $options;
    }

    public static function getPolygon($point) {
        $streets = Street::all();
        $length = count($streets);
        function location($object) {
            return array($object->lat, $object->lng);
        }

        for($i = 0; $i<$length; $i++) {
            $s = $streets[$i];
            try{
              $json = $s['position'];
              if(!empty($json)) {
                $polygonObject = json_decode($json);
                $polygon = ($polygonObject->latlng) ? $polygonObject->latlng: array();
                $polygon = array_map('location', $polygon);
                if( Street::contains($point, $polygon) ) {
                    return $s->toArray();
                }
              }
            }catch(Exception $e){
              echo 'Error';
            }
            
        }
        return false;
    }

    public static function contains($point, $polygon)
    {
      if($polygon[0] != $polygon[count($polygon)-1])
          $polygon[count($polygon)] = $polygon[0];
      $j = 0;
      $oddNodes = false;
      $x = $point[1];
      $y = $point[0];
      $n = count($polygon);
      for ($i = 0; $i < $n; $i++)
      {
          $j++;
          if ($j == $n)
          {
              $j = 0;
          }
          if ((($polygon[$i][0] < $y) && ($polygon[$j][0] >= $y)) || (($polygon[$j][0] < $y) && ($polygon[$i][0] >=
              $y)))
          {
              if ($polygon[$i][1] + ($y - $polygon[$i][0]) / ($polygon[$j][0] - $polygon[$i][0]) * ($polygon[$j][1] -
                  $polygon[$i][1]) < $x)
              {
                  $oddNodes = !$oddNodes;
              }
          }
      }
      return $oddNodes;
    }
}