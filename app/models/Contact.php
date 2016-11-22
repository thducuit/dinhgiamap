<?php
class Contact extends Eloquent{
    protected $table = 'contacts';
    protected $fillable = array('name', 'phone', 'email', 'title', 'content');
    
    
}