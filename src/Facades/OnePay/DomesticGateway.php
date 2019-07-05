<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Facades\OnePay;

use Illuminate\Support\Facades\Facade;
use Omnipay\OnePay\DomesticGateway as OnePayGateway;

/**
 * @method static \Omnipay\OnePay\Message\Domestic\PurchaseRequest purchase(array $options = [])
 * @method static \Omnipay\OnePay\Message\Domestic\QueryTransactionRequest queryTransaction(array $options = [])
 * @method static \Omnipay\OnePay\Message\IncomingRequest completePurchase(array $options = [])
 * @method static \Omnipay\OnePay\Message\IncomingRequest notification(array $options = [])
 *
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class DomesticGateway extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor(): OnePayGateway
    {
        return static::$app['omnipay']->gateway('OnePayDomestic');
    }
}
