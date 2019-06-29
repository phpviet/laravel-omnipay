<?php

return [

    // Cấu hình cho các cổng thanh toán tại hệ thống của bạn, các cổng không xài có thể xóa cho gọn hoặc không điền.

    'gateways' => [
        'MoMoAIO' => [
            'driver' => 'MoMo_AllInOne',
            'options' => [
                'accessKey' => '',
                'secretKey' => '',
                'partnerCode' => '',
            ],
        ],
        'MoMoQRCode' => [
            'driver' => 'MoMo_QRCode',
            'options' => [
                'accessKey' => '',
                'secretKey' => '',
                'partnerCode' => '',
            ],
        ],
        'MoMoAIA' => [
            'driver' => 'MoMo_AppInApp',
            'options' => [
                'accessKey' => '',
                'secretKey' => '',
                'partnerCode' => '',
                'publicKey' => '',
            ],
        ],
        'MoMoPOS' => [
            'driver' => 'MoMo_POS',
            'options' => [
                'accessKey' => '',
                'secretKey' => '',
                'partnerCode' => '',
                'publicKey' => '',
            ],
        ],
        'OnePayDomestic' => [
            'driver' => 'OnePay_Domestic',
            'options' => [
                'merchant' => '',
                'accessCode' => '',
                'hashCode' => '',
                'user' => '',
                'password' => '',
                'testMode' => false,
            ],
        ],
        'OnePayInternational' => [
            'driver' => 'OnePay_International',
            'options' => [
                'merchant' => '',
                'accessCode' => '',
                'hashCode' => '',
                'user' => '',
                'password' => '',
                'testMode' => false,
            ],
        ],
        'VTCPay' => [
            'driver' => 'VtcPay',
            'options' => [
                'receiverAccount' => '',
                'websiteId' => '',
                'securityCode' => '',
                'testMode' => false,
            ],
        ],
        'VNPay' => [
            'driver' => 'VnPay',
            'options' => [
                'tmnCode' => '',
                'hashSecret' => '',
                'testMode' => false,
            ],
        ],
    ],
];
