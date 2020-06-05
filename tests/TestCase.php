<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Tests;

use Ignited\LaravelOmnipay\LaravelOmnipayServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use PHPViet\Laravel\Omnipay\OmnipayServiceProvider;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class TestCase extends BaseTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('laravel-omnipay', require __DIR__.'/config.php');
    }

    protected function getPackageProviders($app): array
    {
        return [
            LaravelOmnipayServiceProvider::class,
            OmnipayServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'MoMoAIO' => 'PHPViet\Laravel\Omnipay\Facades\MoMo\AllInOneGateway',
            'MoMoAIA' => 'PHPViet\Laravel\Omnipay\Facades\MoMo\AppInAppGateway',
            'MoMoPOS' => 'PHPViet\Laravel\Omnipay\Facades\MoMo\POSGateway',
            'MoMoQRCode' => 'PHPViet\Laravel\Omnipay\Facades\MoMo\QRCodeGateway',
            'OnePayDomestic' => 'PHPViet\Laravel\Omnipay\Facades\OnePay\DomesticGateway',
            'OnePayInternational' => 'PHPViet\Laravel\Omnipay\Facades\OnePay\InternationalGateway',
            'VNPay' => 'PHPViet\Laravel\Omnipay\Facades\VNPay\Gateway',
            'VTCPay' => 'PHPViet\Laravel\Omnipay\Facades\VTCPay\Gateway',
        ];
    }
}
