<?php

namespace PHPViet\Laravel\Omnipay\Facades\MoMo;

use Illuminate\Support\Facades\Facade;
use Omnipay\MoMo\AllInOneGateway as MoMoGateway;

/**
 * @method static \Omnipay\MoMo\Message\AllInOne\PurchaseRequest purchase(array $options = [])
 * @method static \Omnipay\MoMo\Message\AllInOne\QueryTransactionRequest queryTransaction(array $options = [])
 * @method static \Omnipay\MoMo\Message\AllInOne\CompletePurchaseRequest completePurchase(array $options = [])
 * @method static \Omnipay\MoMo\Message\AllInOne\NotificationRequest notification(array $options = [])
 * @method static \Omnipay\MoMo\Message\AllInOne\QueryRefundRequest queryRefund(array $options = [])
 *
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class AllInOneGateway extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor(): MoMoGateway
    {
        return static::$app['omnipay']->gateway('MoMoAIO');
    }
}
