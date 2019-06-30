<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Facades\OnePay;

use Illuminate\Support\Facades\Facade;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class Gateway extends Facade
{
    /**
     * Phương thức tạo yêu cầu truy vấn thông tin giao dịch đến OnePay.
     *
     * Đây là phương thức ánh xạ của [[fetchCheckout()]] với mục đích đồng bộ các phương thức so với các cổng thanh toán khác.
     *
     * @param  array  $options
     * @return mixed
     */
    public static function queryTransaction(array $options = [])
    {
        return static::fetchCheckout($options);
    }

    /**
     * Phương thức tạo yêu cầu IPN request do OnePay gửi sang.
     *
     * @param  array  $options
     * @return mixed
     */
    public static function notification(array $options = [])
    {
        return static::completePurchase($options);
    }
}
