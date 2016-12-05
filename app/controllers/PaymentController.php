<?php
use Ducnguyen\Storage\Payment\PaymentRepository as Payment; 
use Ducnguyen\Storage\Cart\CartRepository as Cart; 

class PaymentController extends BaseController {
    
    private $payment;

    private $cart;
    
    public function __construct(Cart $c, Payment $p)
    {
        $this->cart = $c;
        $this->payment = $p;
    }

    public function getIndex()
    {      
        $payment = (Session::get('payment')) ? Session::get('payment') : 0;
        $packageServices = PaymentService::all();
        
        return View::make('default.page.payment')
            ->with(array('title'=> 'thanh toán'))
            ->with(array('payment'=> $payment))
            ->with(array('body_class'=> 'page_thanhtoan'))
            ->with(array('packageServices' => $packageServices));
    }

    public function getStep1()
    {
        $payment = (Session::get('payment')) ? Session::get('payment') : 0;
        return View::make('default.page.payment')
            ->with(array('title'=> 'thanh toán'))
            ->with(array('payment'=> $payment))
            ->with(array('body_class'=> 'page_thanhtoan'));
    }

    public function postStep1()
    {
       
        $rules = array(
            'goidichvu_thanhtoan' => 'required'
        );

        $messages = array(
            'goidichvu_thanhtoan.required' => 'Chọn gói dịch vụ phù hợp'
        );      

        $validation = Validator::make(Input::get(), $rules, $messages);

        if( $validation->fails() )
        {
            return Redirect::to('/payment/step1')
            ->withInput(Input::all())
            ->withErrors($validation);
        }

        Session::put('payment', Input::get('goidichvu_thanhtoan'));
        
        //if user logged in and made the payment
        if( Input::get('goidichvu_thanhtoan') && Sentry::check() )
        {
            $user = Sentry::getUser();

            $customer = User::find($user->id)->customer;
            //check if customer has enough money
            if( $customer && $this->payment->checkBalanceCustomerWithFee($customer->account) )
            {
                $this->getResult($customer);

                $this->reset();

                return Redirect::to('/result');
            }
            else 
            {
                Session::put('step', 3);

                return Redirect::to('/payment/step2');
            }
        }
        else
        {
            Session::put('step', 3);

            return Redirect::to('/payment/step2');
        }
    }

    private function getResult($customer)
    {
        $result = $this->cart->getLastResult();

        //Save account
        $customer->account = $this->payment->getAmount($customer->account);

        $customer->save();

        //Save result
        $data = array(
            'name' => $result['name'],
            'place_id' => $result['place_id'],
            'unit_price' => $result['unit_price'],
            'building_price' => $result['building_price'],
            'total_price' => $result['total_price'],
            'total' => $result['total']
        );

        $result = Result::create($data);

        //Save payment
        $data = array(
            'payment_service_id' => Session::get('payment'),
            'payment' => $this->payment->getFee(),
            'status' => 1,
            'user_id' => Sentry::getUser()->id,
            'result_id' => $result->id
        );

        Payments::create($data);
    }

    public function getStep2()
    {
      $user = Sentry::getUser();
      $customer = null;
      if($user){
        $customer = User::find($user->id)->customer;        
      }
        return View::make('default.page.payment2')
        ->with(array('title'=> 'hình thức thanh toán'))
        ->with(array('name_service'=> $this->getPaymentServiceName()))
        ->with(array('body_class'=> 'page_thanhtoan'))
        ->with(array('customer'=> $customer));
    }

    public function postStep2()
    {
        $rules = array(
            'hinhthucthanhtoan' => 'required'
        );

        $messages = array(
            'hinhthucthanhtoan.required' => 'Chọn hình thức thanh toán',
        );

        $validation = Validator::make(Input::get(), $rules, $messages);

        if( $validation->fails() )
        {
            return Redirect::to('/payment/step2')
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        Session::put('payment_type', Input::get('hinhthucthanhtoan'));
        switch( Input::get('hinhthucthanhtoan') )
        {
            case 'card':
                //validate card input 
                $rules = array(
                    'sms_option' => 'required',
                    'pin' => 'required',
                    'serial' => 'required',
                );

                $messages = array(
                    'sms_option.required' => 'Chọn loại thẻ cảo',
                    'pin.required' => 'Nhập số pin',
                    'serial.required' => 'Nhập số serial',
                );

                $validation = Validator::make(Input::get(), $rules, $messages);

                if( $validation->fails() )
                {
                    return Redirect::to('/payment/step2')
                    ->withInput(Input::all())
                    ->withErrors($validation);
                }
                //charge by card
                $response = $this->cardCharging();

                //progress response
                if( $this->payment->isChargingByCardSuccess($response) )
                {
                    $this->updateUserAccount($response->amount);
                    $this->savePayment($response->amount, 1);
                    Session::put('step', 4);
                    return Redirect::to('/payment/step3');
                }
                else
                {
                    $this->savePayment($response->amount, 0);
                    return Redirect::to('/payment/step2')
                        ->with('message', $response->description);
                }

                break;
            case 'visa':
                return Redirect::to($this->visaCharging());
                break;
            case 'internetbanking':
                return Redirect::to($this->bankCharging());
                break;
            default:
                return Redirect::to('/payment/step3')
                    ->with('message', 'Cảm ơn bạn đã sử dung dịch vụ của chúng tôi. Ngay sau khi nhận được thông tin thanh toán bô phận CSKH sẽ liên lạc với bạn để cung cấp kết quả định giá tài sản của bạn.');
        }

        //return Redirect::to('/payment/step3');
    }

    private function visaCharging()
    {
        $returnUrl = URL::to('/payment/visa');
        $payUrl = $this->payment->visaCharging($this->payment->getFee(), $returnUrl, 'cen-price', 1);
        dd($payUrl); die();
        return $payUrl;
    }

    public function getBanking()
    {
        $response = $this->payment->bankChargingResponse();
        if($response) 
        {
            if( $this->payment->isChargingByBankSuccess($response) )
            {
                $this->updateUserAccount($response->amount);
                $this->savePayment($response->amount, 1);
                Session::put('step', 4);
                return Redirect::to('/payment/step3');
            }
            else
            {
                $this->savePayment($response->amount, 0);
                return Redirect::to('/payment/step2')
                    ->with('message', $response->response_message);
            }
        }else {
            $this->savePayment($response->amount, 0);
            return Redirect::to('/payment/step2')
                    ->with('message', 'Giao dịch không thành công');
        }
    }

    public function getVisa()
    {
        $response = $this->payment->visaChargingResponse();
        if($response) 
        {
            if( $this->payment->isChargingByVisaSuccess($response) )
            {
                $this->updateUserAccount($response->amount);
                $this->savePayment($response->amount, 1);
                Session::put('step', 4);
                return Redirect::to('/payment/step3');
            }
            else
            {
                $this->savePayment($response->amount, 0);
                return Redirect::to('/payment/step2')
                    ->with('message', $response->response_message);
            }
        }else {
            $this->savePayment($response->amount, 0);
            return Redirect::to('/payment/step2')
                    ->with('message', 'Giao dịch không thành công');
        }
    }

    public function getSms()
    {
        $response = $this->payment->smsCharging();
        if($response && $this->payment->isChargingBySmsSuccess($response))
        {
            $this->updateUserAccount($this->payment->getFee());
        }
        return Response::json($response);
    }

    private function bankCharging()
    {
        $returnUrl = URL::to('/payment/banking');
        $payUrl = $this->payment->bankCharging($this->payment->getFee(), $returnUrl, 'cen-price', 1);
        return $payUrl;
    }

    private function cardCharging() 
    {
        $type = Input::get('sms_option');
        $pin = Input::get('pin');
        $serial = Input::get('serial');
        return json_decode($this->payment->cardCharging($type, $pin, $serial));
    }

    public function getStep3()
    {
        $user = Sentry::getUser();
        $customer = null;
        if($user){
          $customer = User::find($user->id)->customer;
        }
        return View::make('default.page.payment3')
            ->with(array('customer'=> $customer))
            ->with(array('name_service'=> $this->getPaymentServiceName()))
            ->with(array('name_type'=> $this->getPaymentTypeName()))
            ->with(array('title'=> 'hoàn tất thanh toán'))
            ->with(array('body_class'=> 'page_thanhtoan'));
    }

    private function updateUserAccount($amount)
    {
        $user = Sentry::getUser();
        $customer = User::find($user->id)->customer;
        $customer->account += $amount;
        $customer->save(); 
    }

    private function savePayment($amount, $status)
    {
         //Save payment
        $data = array(
            'payment_service_id' => Session::get('payment'),
            'payment' => $amount,
            'status' => $status,
            'user_id' => Sentry::getUser()->id,
            'payment_type' => Session::get('payment_type')
        );

        Payments::create($data);
    }

    private function reset()
    {
        Session::put('step', 0);
        Session::put('payment', 0);
        Session::put('payment_type', '');
    }

    private function getPaymentServiceName()
    {      
        $name = null;
        if(Session::get('payment'))
        {
            $name = PaymentService::find(Session::get('payment'))->title;
        }
        return $name;
    }

    private function getPaymentTypeName()
    {
        $name = null;
        if(Session::get('payment_type'))
        {
            $name = PaymentType::find(Session::get('payment_type'))->title;
        }
        return $name;
    }

}