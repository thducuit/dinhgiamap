{"filter":false,"title":"Contact.php","tooltip":"/app/models/Contact.php","undoManager":{"mark":46,"position":46,"stack":[[{"start":{"row":0,"column":0},"end":{"row":20,"column":1},"action":"insert","lines":["<?php","class District extends Eloquent{","    protected $table = 'district';","    ","    // public static function getOptions($province_id = 0)","    // {","    //     $district = District::find();","    //     $options = array();","    //     foreach($district as $d) {","    //         $options = array_add($options, $d->id, $d->name);","    //     }","    //     return $options;","    // }","    ","    public function wards()","    {","        return $this->hasMany('Ward');","    }","    ","    ","}"],"id":1}],[{"start":{"row":2,"column":34},"end":{"row":12,"column":8},"action":"remove","lines":["","    ","    // public static function getOptions($province_id = 0)","    // {","    //     $district = District::find();","    //     $options = array();","    //     foreach($district as $d) {","    //         $options = array_add($options, $d->id, $d->name);","    //     }","    //     return $options;","    // }"],"id":2}],[{"start":{"row":2,"column":34},"end":{"row":7,"column":5},"action":"remove","lines":["","    ","    public function wards()","    {","        return $this->hasMany('Ward');","    }"],"id":3}],[{"start":{"row":1,"column":6},"end":{"row":1,"column":14},"action":"remove","lines":["District"],"id":4},{"start":{"row":1,"column":6},"end":{"row":1,"column":7},"action":"insert","lines":["C"]}],[{"start":{"row":1,"column":7},"end":{"row":1,"column":8},"action":"insert","lines":["o"],"id":5}],[{"start":{"row":1,"column":8},"end":{"row":1,"column":9},"action":"insert","lines":["n"],"id":6}],[{"start":{"row":1,"column":9},"end":{"row":1,"column":10},"action":"insert","lines":["t"],"id":7}],[{"start":{"row":1,"column":10},"end":{"row":1,"column":11},"action":"insert","lines":["a"],"id":8}],[{"start":{"row":1,"column":11},"end":{"row":1,"column":12},"action":"insert","lines":["c"],"id":9}],[{"start":{"row":1,"column":12},"end":{"row":1,"column":13},"action":"insert","lines":["t"],"id":10}],[{"start":{"row":2,"column":24},"end":{"row":2,"column":32},"action":"remove","lines":["district"],"id":11},{"start":{"row":2,"column":24},"end":{"row":2,"column":25},"action":"insert","lines":["c"]}],[{"start":{"row":2,"column":25},"end":{"row":2,"column":26},"action":"insert","lines":["o"],"id":12}],[{"start":{"row":2,"column":26},"end":{"row":2,"column":27},"action":"insert","lines":["n"],"id":13}],[{"start":{"row":2,"column":27},"end":{"row":2,"column":28},"action":"insert","lines":["t"],"id":14}],[{"start":{"row":2,"column":28},"end":{"row":2,"column":29},"action":"insert","lines":["a"],"id":15}],[{"start":{"row":2,"column":29},"end":{"row":2,"column":30},"action":"insert","lines":["c"],"id":16}],[{"start":{"row":2,"column":30},"end":{"row":2,"column":31},"action":"insert","lines":["t"],"id":17}],[{"start":{"row":2,"column":31},"end":{"row":2,"column":32},"action":"insert","lines":["s"],"id":18}],[{"start":{"row":2,"column":34},"end":{"row":3,"column":0},"action":"insert","lines":["",""],"id":19},{"start":{"row":3,"column":0},"end":{"row":3,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":3,"column":4},"end":{"row":3,"column":69},"action":"insert","lines":[" protected $fillable = array('first_name', 'last_name', 'email');"],"id":20}],[{"start":{"row":3,"column":34},"end":{"row":3,"column":44},"action":"remove","lines":["first_name"],"id":21},{"start":{"row":3,"column":34},"end":{"row":3,"column":35},"action":"insert","lines":["n"]}],[{"start":{"row":3,"column":35},"end":{"row":3,"column":36},"action":"insert","lines":["a"],"id":22}],[{"start":{"row":3,"column":36},"end":{"row":3,"column":37},"action":"insert","lines":["m"],"id":23}],[{"start":{"row":3,"column":37},"end":{"row":3,"column":38},"action":"insert","lines":["e"],"id":24}],[{"start":{"row":3,"column":42},"end":{"row":3,"column":51},"action":"remove","lines":["last_name"],"id":25},{"start":{"row":3,"column":42},"end":{"row":3,"column":43},"action":"insert","lines":["o"]}],[{"start":{"row":3,"column":43},"end":{"row":3,"column":44},"action":"insert","lines":["h"],"id":26}],[{"start":{"row":3,"column":44},"end":{"row":3,"column":45},"action":"insert","lines":["o"],"id":27}],[{"start":{"row":3,"column":45},"end":{"row":3,"column":46},"action":"insert","lines":["n"],"id":28}],[{"start":{"row":3,"column":46},"end":{"row":3,"column":47},"action":"insert","lines":["e"],"id":29}],[{"start":{"row":3,"column":42},"end":{"row":3,"column":47},"action":"remove","lines":["ohone"],"id":30},{"start":{"row":3,"column":42},"end":{"row":3,"column":43},"action":"insert","lines":["p"]}],[{"start":{"row":3,"column":43},"end":{"row":3,"column":44},"action":"insert","lines":["h"],"id":31}],[{"start":{"row":3,"column":44},"end":{"row":3,"column":45},"action":"insert","lines":["o"],"id":32}],[{"start":{"row":3,"column":45},"end":{"row":3,"column":46},"action":"insert","lines":["n"],"id":33}],[{"start":{"row":3,"column":46},"end":{"row":3,"column":47},"action":"insert","lines":["e"],"id":34}],[{"start":{"row":3,"column":57},"end":{"row":3,"column":75},"action":"insert","lines":[", 'phone', 'email'"],"id":35}],[{"start":{"row":3,"column":60},"end":{"row":3,"column":65},"action":"remove","lines":["phone"],"id":36},{"start":{"row":3,"column":60},"end":{"row":3,"column":61},"action":"insert","lines":["t"]}],[{"start":{"row":3,"column":61},"end":{"row":3,"column":62},"action":"insert","lines":["i"],"id":37}],[{"start":{"row":3,"column":62},"end":{"row":3,"column":63},"action":"insert","lines":["t"],"id":38}],[{"start":{"row":3,"column":63},"end":{"row":3,"column":64},"action":"insert","lines":["l"],"id":39}],[{"start":{"row":3,"column":64},"end":{"row":3,"column":65},"action":"insert","lines":["e"],"id":40}],[{"start":{"row":3,"column":69},"end":{"row":3,"column":74},"action":"remove","lines":["email"],"id":41},{"start":{"row":3,"column":69},"end":{"row":3,"column":70},"action":"insert","lines":["c"]}],[{"start":{"row":3,"column":70},"end":{"row":3,"column":71},"action":"insert","lines":["o"],"id":42}],[{"start":{"row":3,"column":71},"end":{"row":3,"column":72},"action":"insert","lines":["n"],"id":43}],[{"start":{"row":3,"column":72},"end":{"row":3,"column":73},"action":"insert","lines":["t"],"id":44}],[{"start":{"row":3,"column":73},"end":{"row":3,"column":74},"action":"insert","lines":["e"],"id":45}],[{"start":{"row":3,"column":74},"end":{"row":3,"column":75},"action":"insert","lines":["n"],"id":46}],[{"start":{"row":3,"column":75},"end":{"row":3,"column":76},"action":"insert","lines":["t"],"id":47}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":3,"column":76},"end":{"row":3,"column":76},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1472006434869,"hash":"74c44328970c53340021bc4ef6f846cea3d3756d"}