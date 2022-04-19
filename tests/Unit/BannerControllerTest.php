<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\BannerController;
use Illuminate\Http\Request;

class BannerControllerTest extends TestCase
{
  

  /** @test */
    public function shouldNotStoreNewRequestBannerTest()
    {

        //prepare
        $banner = new BannerController();
        $request = new Request();
        $banner = new BannerController();
        $request->name = null;
        $alert =  $banner->create($request);
       
       
        //expected
        $alertExpeted = "Precisamos que do seu nome para realizar o pedido";
        

        //result      
      $this->assertEquals ($alert,$alertExpeted);


    }
}
