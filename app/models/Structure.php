<?php
class Structure extends Eloquent{
    protected $table = 'structure';
    
    public function structure_options()
    {
        return $this->hasMany('StructureOption');
    }
    
    public static function findByAlias($alias) 
    {
        return Structure::where('alias', '=', $alias)->first();
    }
    
    public static function findByParent($alias)
    {
        $s = Structure::where('alias', '=', $alias)->first()->toArray();
        return Structure::where('pid', '=', $s['id']);
    }
}