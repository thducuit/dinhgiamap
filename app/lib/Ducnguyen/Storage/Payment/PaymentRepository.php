<?php
namespace Ducnguyen\Storage\Payment;

interface PaymentRepository
{
    public function checkBalanceCustomerWithFee($customer);

    public function getAmount($balance);

    public function getFee();

    public function cardCharging($type, $pin, $seri);

    public function isChargingByCardSuccess($response);

    public function bankCharging($amount, $returnUrl, $orderId, $orderInfo);

    public function bankChargingResponse();

    public function isChargingByBankSuccess($response);

    public function visaCharging($amount, $returnUrl, $orderId, $orderInfo);

    public function isChargingByVisaSuccess($response);

    public function visaChargingResponse();

    public function smsCharging();

    public function isChargingBySmsSuccess($response);
}