{"filter":false,"title":"Street.php","tooltip":"/app/models/Street.php","undoManager":{"mark":17,"position":17,"stack":[[{"start":{"row":6,"column":5},"end":{"row":7,"column":0},"action":"insert","lines":["",""],"id":147},{"start":{"row":7,"column":0},"end":{"row":7,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":7,"column":4},"end":{"row":8,"column":0},"action":"insert","lines":["",""],"id":148},{"start":{"row":8,"column":0},"end":{"row":8,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":8,"column":4},"end":{"row":16,"column":5},"action":"insert","lines":["public static function getOptions()","    {","        $districts = District::all();","        $options = array();","        foreach($districts as $d) {","            $options = array_add($options, $d->id, $d->name);","        }","        return $options;","    }"],"id":149}],[{"start":{"row":10,"column":21},"end":{"row":10,"column":29},"action":"remove","lines":["District"],"id":150},{"start":{"row":10,"column":21},"end":{"row":10,"column":22},"action":"insert","lines":["S"]}],[{"start":{"row":10,"column":22},"end":{"row":10,"column":23},"action":"insert","lines":["t"],"id":151}],[{"start":{"row":10,"column":23},"end":{"row":10,"column":24},"action":"insert","lines":["r"],"id":152}],[{"start":{"row":10,"column":24},"end":{"row":10,"column":25},"action":"insert","lines":["e"],"id":153}],[{"start":{"row":10,"column":25},"end":{"row":10,"column":26},"action":"insert","lines":["e"],"id":154}],[{"start":{"row":10,"column":26},"end":{"row":10,"column":27},"action":"insert","lines":["t"],"id":155}],[{"start":{"row":10,"column":8},"end":{"row":10,"column":18},"action":"remove","lines":["$districts"],"id":156},{"start":{"row":10,"column":8},"end":{"row":10,"column":9},"action":"insert","lines":["$"]}],[{"start":{"row":10,"column":9},"end":{"row":10,"column":10},"action":"insert","lines":["s"],"id":157}],[{"start":{"row":10,"column":10},"end":{"row":10,"column":11},"action":"insert","lines":["t"],"id":158}],[{"start":{"row":10,"column":11},"end":{"row":10,"column":12},"action":"insert","lines":["r"],"id":159}],[{"start":{"row":10,"column":12},"end":{"row":10,"column":13},"action":"insert","lines":["e"],"id":160}],[{"start":{"row":10,"column":13},"end":{"row":10,"column":14},"action":"insert","lines":["e"],"id":161}],[{"start":{"row":10,"column":14},"end":{"row":10,"column":15},"action":"insert","lines":["t"],"id":162}],[{"start":{"row":10,"column":15},"end":{"row":10,"column":16},"action":"insert","lines":["s"],"id":163}],[{"start":{"row":12,"column":16},"end":{"row":12,"column":26},"action":"remove","lines":["$districts"],"id":164},{"start":{"row":12,"column":16},"end":{"row":12,"column":24},"action":"insert","lines":["$streets"]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":8,"column":4},"end":{"row":16,"column":5},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1470842001814,"hash":"39c8cb184a1af1ad3a95bd910cad162e225eda1c"}