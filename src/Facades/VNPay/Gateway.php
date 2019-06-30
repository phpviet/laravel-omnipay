<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Facades\VNPay;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Omnipay\VnPay\Message\PurchaseRequest purchase(array $options = [])
 * @method static \Omnipay\VnPay\Message\CompletePurchaseRequest completePurchase(array $options = [])
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
        return static::$app['omnipay']->gateway('VNPay');
    }

    /**
     * Tạo yêu cầu truy vấn trạng thái giao dịch đến VNPay.
     *
     * Đây là phương thức ánh xạ của [[fetchTransaction()]] với mục đích đồng bộ các phương thức so với các cổng thanh toán khác.
     *
     * @param  array  $options
     * @return \Omnipay\VnPay\Message\FetchTransactionRequest
     */
    public static function queryTransaction(array $options = [])
    {
        return static::fetchTransaction($options);
    }

    /**
     * Tạo yêu cầu truy vấn trạng thái thanh toán giao dịch đến VNPay.
     *
     * Đây là phương thức ánh xạ của [[fetchCheckout()]] với mục đích đồng bộ các phương thức so với các cổng thanh toán khác.
     *
     * @param  array  $options
     * @return \Omnipay\VnPay\Message\FetchCheckoutRequest
     */
    public static function queryCheckout(array $options = [])
    {
        return static::fetchCheckout($options);
    }

    /**
     * Tạo yêu cầu truy vấn trạng thái giao dịch hoàn tiền đến VNPay.
     *
     * Đây là phương thức ánh xạ của [[fetchRefund()]] với mục đích đồng bộ các phương thức so với các cổng thanh toán khác.
     *
     * @param  array  $options
     * @return \Omnipay\VnPay\Message\FetchRefundRequest
     */
    public static function queryRefund(array $options = [])
    {
        return static::fetchRefund($options);
    }
}
