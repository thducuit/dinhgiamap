<?php 
namespace Ducnguyen\Storage;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider {

  public function register()
  {
    $this->registerPriceIoC();
    $this->registerCartIoC();
    $this->registerPaymentIoC();
  }
  
  private function registerPriceIoC()
  {
    $this->app->bind(
      'Ducnguyen\Storage\Price\PriceRepository',
      'Ducnguyen\Storage\Price\Price'
    );
  }

  private function registerCartIoC()
  {
    $this->app->bind(
      'Ducnguyen\Storage\Cart\CartRepository',
      'Ducnguyen\Storage\Cart\Cart'
    );
  }

  private function registerPaymentIoC()
  {
    $this->app->bind(
      'Ducnguyen\Storage\Payment\PaymentRepository',
      'Ducnguyen\Storage\Payment\Payment'
    );
  }

}