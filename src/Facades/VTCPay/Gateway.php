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
     * Tạo yêu cầu truy vấn notification từ VTCPay.
     *
     * Đây là phương thức ánh xạ của [[acceptNotification()]] với mục đích đồng bộ các phương thức so với các cổng thanh toán khác.
     *
     * @param  array  $options
     *
     * @return \Omnipay\VtcPay\Message\AcceptNotificationRequest
     */
    public static function notification(array $options = [])
    {
        return static::getFacadeAccessor()::acceptNotification($options);
    }
}
