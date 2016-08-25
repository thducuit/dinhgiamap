<?php 
namespace Ducnguyen\Storage;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider {

  public function register()
  {
    $this->registerPriceIoC();
  }
  
  private function registerPriceIoC()
  {
    $this->app->bind(
      'Ducnguyen\Storage\Price\PriceRepository',
      'Ducnguyen\Storage\Price\Price'
    );
  }

}