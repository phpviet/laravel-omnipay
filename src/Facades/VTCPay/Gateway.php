<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Facades\VTCPay;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Omnipay\VtcPay\Message\PurchaseRequest purchase(array $options = [])
 * @method static \Omnipay\VtcPay\Message\CompletePurchaseRequest completePurchase(array $options = [])
 *
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class Gateway extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return static::$app['omnipay']->gateway('VTCPay');
    }

    /**
     * Create a request to accept notification.
     *
     * This is an alias of [[acceptNotification()]] for sync with style standard of another gateway.
     *
     * @param  array  $options
     *
     * @return \Omnipay\VtcPay\Message\AcceptNotificationRequest
     */
    public function notification(array $options = [])
    {
        return static::getFacadeAccessor()->acceptNotification($options);
    }
}
