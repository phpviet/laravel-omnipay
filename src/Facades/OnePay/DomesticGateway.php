<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Facades\OnePay;

/**
 * @method static \Omnipay\OnePay\Message\DomesticPurchaseRequest purchase(array $options = [])
 * @method static \Omnipay\OnePay\Message\DomesticCompletePurchaseRequest completePurchase(array $options = [])
 * @method static \Omnipay\OnePay\Message\DomesticCompletePurchaseRequest notification(array $options = [])
 * @method static \Omnipay\OnePay\Message\DomesticFetchCheckoutRequest queryTransaction(array $options = [])
 *
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class DomesticGateway extends Gateway
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return static::$app['omnipay']->gateway('OnePayDomestic');
    }
}
