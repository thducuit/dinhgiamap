<?php
class Group extends Eloquent {
    protected $table = 'groups';
    
    public static function getOptions()
    {
        $groups = Group::all();
        $options = array();
        foreach($groups as $d) {
            $options = array_add($options, $d->name, $d->name);
        }
        return $options;
    }
}