<?php
namespace Ducnguyen\Storage\Cart;

interface CartRepository
{
    public function store($result);

    public function show();

    public function isEmpty();

    public function clear();

    public function getLastResult();

    public function putCart($cart);

    public function getCart();
}