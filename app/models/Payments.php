<?php
class Payments extends Eloquent{
    protected $table = 'payments';
    protected $fillable = array('payment_service_id', 'payment', 'status', 'user_id', 'result_id', 'payment_type');
}