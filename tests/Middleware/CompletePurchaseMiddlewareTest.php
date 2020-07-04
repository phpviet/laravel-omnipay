<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Tests\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Omnipay\Common\Message\ResponseInterface;
use PHPViet\Laravel\Omnipay\Middleware\CompletePurchaseMiddleware;
use PHPViet\Laravel\Omnipay\Tests\TestCase;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class CompletePurchaseMiddlewareTest extends TestCase
{
    public function getEnvironmentSetUp($app): void
    {
        $_GET['partnerCode'] = 'test';
        $_GET['accessKey'] = 'test';
        $_GET['requestId'] = 'test';
        $_GET['amount'] = 'test';
        $_GET['orderId'] = 'test';
        $_GET['orderInfo'] = 'test';
        $_GET['orderType'] = 'test';
        $_GET['transId'] = 'test';
        $_GET['message'] = 'test';
        $_GET['localMessage'] = 'test';
        $_GET['responseTime'] = 'test';
        $_GET['errorCode'] = 'test';
        $_GET['extraData'] = 'test';
        $_GET['signature'] = 'test';
        $_GET['payType'] = 'test';

        parent::getEnvironmentSetUp($app);

        $router = $app->get('router');
        $router->middleware(CompletePurchaseMiddleware::class);
        $router->aliasMiddleware('completePurchase', CompletePurchaseMiddleware::class);
        $router->get(
            '/test',
            function (Request $request) {
                $completePurchaseResponse = $request->attributes->get('completePurchaseResponse');

                $this->assertInstanceOf(ResponseInterface::class, $completePurchaseResponse);

                return new Response('ok', 200);
            }
        )->middleware('completePurchase:MoMoAIO');
    }

    public function testCanGetResponse()
    {
        $response = $this->get('/test');
        $response->assertOk();
    }

    public function testMissingRequestQueryParam()
    {
        unset($_GET['signature']);
        $response = $this->get('/test');
        $response->assertStatus(400);
    }
}
