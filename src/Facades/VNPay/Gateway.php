<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Facades\VNPay;

use Illuminate\Support\Facades\Facade;
use Omnipay\VNPay\Gateway as VNPayGateway;

/**
 * @method static \Omnipay\VNPay\Message\PurchaseRequest purchase(array $options = [])
 * @method static \Omnipay\VNPay\Message\IncomingRequest completePurchase(array $options = [])
 * @method static \Omnipay\VNPay\Message\IncomingRequest notification(array $options = [])
 * @method static \Omnipay\VNPay\Message\QueryTransactionRequest queryTransaction(array $options = [])
 * @method static \Omnipay\VNPay\Message\RefundRequest refund(array $options = [])
 *
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class Gateway extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor(): VNPayGateway
    {
        return static::$app['omnipay']->gateway('VNPay');
    }
}
