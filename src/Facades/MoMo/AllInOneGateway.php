<?php

namespace PHPViet\Laravel\Omnipay\Facades\MoMo;

use Illuminate\Support\Facades\Facade;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class AllInOneGateway extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return static::$app['omnipay']->gateway('MoMoAIO');
    }
}
