<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Facades\MoMo;

use Illuminate\Support\Facades\Facade;
use Omnipay\MoMo\QRCodeGateway as MoMoGateway;

/**
 * @method static \Omnipay\MoMo\Message\QRCode\NotificationRequest notification(array $options = [])
 * @method static \Omnipay\MoMo\Message\PayConfirmRequest payConfirm(array $options = [])
 * @method static \Omnipay\MoMo\Message\PayQueryStatusRequest queryTransaction(array $options = [])
 * @method static \Omnipay\MoMo\Message\PayRefundRequest queryRefund(array $options = [])
 *
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class QRCodeGateway extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor(): MoMoGateway
    {
        return static::$app['omnipay']->gateway('MoMoQRCode');
    }
}
