<?php
namespace Ducnguyen\Storage\Payment;

class Payment implements PaymentRepository
{

	private $fee = 15000;

	private $accessKey = 'm9crnvhvs5qr2l0mjp1g';

	private $secret = 'pqzggslpek4zbfmgnfrwokqy39ok899l';

	private static $SUCCESS_STATUS = '00';

    public function checkBalanceCustomerWithFee($balance) 
    {
    	return $balance >= $this->fee;
    }

    public function getAmount($balance) 
    {
    	return $balance - $this->fee;
    }

    public function getFee()
    {
    	return $this->fee;
    }

    private function cardChargingRequest($url, $data)
    {
    	// open connection
		$ch = curl_init();
		// set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// execute post
		$result = curl_exec($ch);
		// close connection
		curl_close($ch);
		return $result;
    }

    public function cardCharging($type, $pin, $serial)
    {
    	$data = "access_key=" . $this->accessKey . "&pin=" . $pin . "&serial=" . $serial . "&type=" . $type;
		$signature = hash_hmac("sha256", $data, $this->secret);
		$data .= "&signature=" . $signature;
    	return $this->cardChargingRequest('https://api.1pay.vn/card-charging/v2/topup', $data);
    }

    public function isChargingByCardSuccess($response)
    {
    	return $response->status == Payment::$SUCCESS_STATUS;
    }

    private function execBankingRequest($url, $data)
    {
    	$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $result = curl_exec($ch);
	    curl_close($ch);
	    return $result;
    }

    public function bankCharging($amount, $returnUrl, $orderId, $orderInfo)
    {
	   $command = 'request_transaction';
	   
	   $data = "access_key=".$this->accessKey."&amount=".$amount."&command=".$command."&order_id=".$orderId."&order_info=".$orderInfo."&return_url=".$returnUrl;
	   $signature = hash_hmac("sha256", $data, $this->secret);
	   $data.= "&signature=".$signature;
	   $json_bankCharging = $this->execBankingRequest('http://api.1pay.vn/bank-charging/service', $data);
	    //Ex: {"pay_url":"http://api.1pay.vn/bank-charging/sml/nd/order?token=LuNIFOeClp9d8SI7XWNG7O%2BvM8GsLAO%2BAHWJVsaF0%3D", "status":"init", "trans_ref":"16aa72d82f1940144b533e788a6bcb6"}
	   $decode_bankCharging=json_decode($json_bankCharging,true);  // decode json
	   $pay_url = $decode_bankCharging["pay_url"];
	   return $pay_url;
    }

    private function execBankingResponse($url, $data)
    {
    	$ch = curl_init();
	   	curl_setopt($ch, CURLOPT_URL, $url);
	   	curl_setopt($ch, CURLOPT_POST, 1);
	   	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	   	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	   	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	   	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	   	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	   	$result = curl_exec($ch);
	   	curl_close($ch);
	   	return $result;
    }

    public function bankChargingResponse()
    {
    	$trans_ref = isset($_GET["trans_ref"]) ? $_GET["trans_ref"] : NULL;

		//$response_code = isset($_GET["response_code"]) ? $_GET["response_code"] : NULL;

		$command = "close_transaction";

		$data = "access_key=".$this->accessKey."&command=".$command."&trans_ref=".$trans_ref;
		$signature = hash_hmac("sha256", $data, $this->secret);
		$data.= "&signature=" . $signature;

		return json_decode($this->execBankingResponse('http://api.1pay.vn/bank-charging/service', $data));

		//$decode_bankCharging = json_decode($json_bankCharging, true);  // decode json

		// Ex: {"amount":10000,"trans_status":"close","response_time": "2014-12-31T00:52:12Z","response_message":"Giao dịch thành công","response_code":"00","order_info":"test dich vu","order_id":"001","trans_ref":"44df289349c74a7d9690ad27ed217094", "request_time":"2014-12-31T00:50:11Z","order_type":"ND"}	
    }

    public function isChargingByBankSuccess($response)
    {
    	return $response->response_code == Payment::$SUCCESS_STATUS;
    }

    private function execVisaRequest($url, $data)
    {
    	$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $result = curl_exec($ch);
	    curl_close($ch);
	    return $result;
    }

    private function execVisaResponse($url, $data)
    {
    	$ch = curl_init();
	   	curl_setopt($ch, CURLOPT_URL, $url);
	   	curl_setopt($ch, CURLOPT_POST, 1);
	   	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	   	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	   	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	   	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	   	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	   	$result = curl_exec($ch);
	   	curl_close($ch);
	   	return $result;
    }

    public function visaCharging($amount, $returnUrl, $orderId, $orderInfo)
    {
    	$data = "access_key=".$this->accessKey."&amount=".$amount."&order_id=".$orderId."&order_info=".$orderInfo."&return_url=".$returnUrl;
	   	$signature = hash_hmac("sha256", $data, $this->secret);
	   	$data.= "&signature=".$signature;
	   	$json_bankCharging = $this->execVisaRequest('http://visa.1pay.vn/visa-charging/api/handle/request', $data);
	   	$decode_bankCharging=json_decode($json_bankCharging,true);  // decode json
	   	dd($json_bankCharging); die();
	   	$pay_url = $decode_bankCharging["pay_url"];
	   	return $pay_url;
    }

    public function visaChargingResponse()
    {
		$trans_ref = isset($_GET["trans_ref"]) ? $_GET["trans_ref"] : NULL;

		$data = "access_key=".$this->accessKey."&trans_ref=".$trans_ref;
		$signature = hash_hmac("sha256", $data, $this->secret);
		$data.= "&signature=" . $signature;

		return json_decode($this->execVisaResponse('http://visa.1pay.vn/visa-charging/api/handle/request', $data));
    }

    public function isChargingByVisaSuccess($response)
    {
    	return $response->response_code == Payment::$SUCCESS_STATUS;
    }

    public function smsCharging()
    {
    	$arParams['access_key'] = $_GET['access_key'] ? $_GET['access_key'] : '';
		$arParams['command'] = $_GET['command'] ? $_GET['command'] : '';
		$arParams['mo_message'] = $_GET['mo_message'] ? $_GET['mo_message'] : '';
		$arParams['msisdn'] = $_GET['msisdn'] ? $_GET['msisdn'] : '';
		$arParams['request_id'] = $_GET['request_id'] ? $_GET['request_id'] : '';
		$arParams['request_time'] = $_GET['request_time'] ? $_GET['request_time'] : '';
		$arParams['short_code'] = $_GET['short_code'] ? $_GET['short_code'] : '';
		$arParams['signature'] = $_GET['signature'] ? $_GET['signature'] : '';
		$data = "access_key=" . $arParams['access_key'] . "&command=" . $arParams['command'] . "&mo_message=" . $arParams['mo_message'] . "&msisdn=" . $arParams['msisdn'] . "&request_id=" . $arParams['request_id'] . "&request_time=" . $arParams['request_time'] . "&short_code=" . $arParams['short_code'];

		$signature = hash_hmac("sha256", $data, $this->secret); 
		$arResponse['type'] = 'text';

		if ($arParams['signature'] == $signature) {
			//if sms content, amount,... are ok. return success
			$arResponse['status'] = 1;
			$arResponse['sms'] = 'Giao dich thanh cong ... Hotline...';
		}
		else {
			//if not, return unsuccess
			$arResponse['status'] = 0;
			$arResponse['sms'] = 'Giao dich khong thanh cong. Tin nhan se duoc hoan cuoc sau 20 ngay. Hotline...';
		}

		// return json for 1pay system
		echo $arResponse;
    }

    public function isChargingBySmsSuccess($response) 
    {
    	return $response['status'] == 1;
    }
}