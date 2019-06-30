<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Facades\OnePay;

/**
 * @method static \Omnipay\OnePay\Message\InternationalPurchaseRequest purchase(array $options = [])
 * @method static \Omnipay\OnePay\Message\InternationalCompletePurchaseRequest completePurchase(array $options = [])
 * @method static \Omnipay\OnePay\Message\InternationalCompletePurchaseRequest notification(array $options = [])
 * @method static \Omnipay\OnePay\Message\InternationalFetchCheckoutRequest queryTransaction(array $options = [])
 *
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class InternationalGateway extends Gateway
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return static::$app['omnipay']->gateway('OnePayInternational');
    }
}
