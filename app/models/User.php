<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	public function customer()
	{
		return $this->hasOne('Customer');
	}

	public function streets()
	{
		return $this->hasMany('Street');
	}

	public function marker()
	{
		return $this->hasMany('Marker');
	}
    
    public static function getKetCauChinh(){
      return array(
          array(
              'label' => 'Nhà phố 1 tầng',
              'price' => '3000000'
          ),
          array(
              'label' => 'Nhà phố 2 tầng',
              'price' => '4000000'
          ),
          array(
              'label' => 'Nhà phố 3 tầng',
              'price' => '4800000'
          ),
          array(
              'label' => 'Nhà phố 4 tầng',
              'price' => '5500000'
          ),
          array(
              'label' => 'Nhà phố 5 tầng trở lên',
              'price' => '6000000'
          ),
          array(
              'label' => 'Nhà biệt thự 1 tầng',
              'price' => '6500000'
          ),
          array(
              'label' => 'Nhà biệt thự 2 tầng trở lên',
              'price' => '7500000'
          )
      );
    }
}
