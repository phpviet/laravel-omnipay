<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Tests\Facades\VNPay;

use PHPViet\Laravel\Omnipay\Tests\FacadeGatewayTestCase;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class GatewayTest extends FacadeGatewayTestCase
{
    protected function getGatewayName(): string
    {
        return 'VNPay';
    }

    protected function getGatewayAlias(): string
    {
        return '\VNPay';
    }
}
