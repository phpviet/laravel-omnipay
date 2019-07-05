<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Facades\VTCPay;

use Illuminate\Support\Facades\Facade;
use Omnipay\VTCPay\Gateway as VTCPayGateway;

/**
 * @method static \Omnipay\VTCPay\Message\PurchaseRequest purchase(array $options = [])
 * @method static \Omnipay\VTCPay\Message\CompletePurchaseRequest completePurchase(array $options = [])
 * @method static \Omnipay\VTCPay\Message\NotificationRequest notification(array $options = [])
 *
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class Gateway extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor(): VTCPayGateway
    {
        return static::$app['omnipay']->gateway('VTCPay');
    }
}
