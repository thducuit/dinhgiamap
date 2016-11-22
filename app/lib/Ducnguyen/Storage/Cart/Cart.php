<?php
namespace Ducnguyen\Storage\Cart;

use Session;

class Cart implements CartRepository {
	
	private $cart;

	public function __construct()
	{
		$this->init();
	}

	private function init()
	{
		$this->cart = Session::get('cart');
		if(empty($this->cart))
		{
			$this->cart = array();
		}
		$this->putCart($this->cart);
	}

	public function putCart($cart)
	{
		Session::put('cart', $this->cart);
	}

	public function getCart()
	{
		return Session::get('cart');
	}

	public function store($result)
	{
		if($result)
		{
			$this->cart = $this->getCart();
			array_push($this->cart, $result);
			$this->putCart($this->cart);
		}
		else
		{
			// code sau
		}
	}

	public function show()
	{
		return $this->getCart();
	}

	public function isEmpty()
	{
		return count($this->getCart()) == 0;
	}

	public function clear()
	{
		$this->cart = array();
		$this->putCart($this->cart);
	}

	public function getLastResult()
	{
		$this->cart = $this->getCart();
		return array_pop($this->cart);
	}
}