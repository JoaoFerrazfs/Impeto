<?php

namespace Tests\Unit;

use Mockery as m;
use App\Http\Controllers\MovementHistoryController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;


class ProductControllerTest extends TestCase
{

    public function shouldSaveToDb()
    {
        // Set
        $movementHistory = m:mock(MovementHistoryController::class);
        $product = m:mock(Product::class);
        $request = m:mock(Resquest::class);
        $productController = new ProductController($movementHistory,$product);

        // Expectations
        $product->sholdReceive('data')
            ->andReturn($request);

        // Action
        $result = $productController->store($request);

        // Assertion

        $this->assertEquals($result,true);



    }

}
