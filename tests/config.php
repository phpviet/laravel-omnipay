<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

return [
    'gateways' => [
        'MoMoAIO' => [
            'driver' => 'MoMo_AllInOne',
            'options' => [
                'testMode' => true,
            ],
        ],
        'MoMoQRCode' => [
            'driver' => 'MoMo_QRCode',
            'options' => [
                'testMode' => true,
            ],
        ],
        'MoMoAIA' => [
            'driver' => 'MoMo_AppInApp',
            'options' => [
                'testMode' => true,
            ],
        ],
        'MoMoPOS' => [
            'driver' => 'MoMo_POS',
            'options' => [
                'testMode' => true,
            ],
        ],
        'OnePayDomestic' => [
            'driver' => 'OnePay_Domestic',
            'options' => [
                'testMode' => true,
            ],
        ],
        'OnePayInternational' => [
            'driver' => 'OnePay_International',
            'options' => [
                'testMode' => true,
            ],
        ],
        'VTCPay' => [
            'driver' => 'VTCPay',
            'options' => [
                'testMode' => true,
            ],
        ],
        'VNPay' => [
            'driver' => 'VNPay',
            'options' => [
                'testMode' => true,
            ],
        ],
    ],
];
