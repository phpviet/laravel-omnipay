<p align="center">
    <a href="https://github.com/laravel" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/958072" height="100px">
    </a>
    <h1 align="center">Laravel Omnipay</h1>
    <br>
    <p align="center">
    <a href="https://packagist.org/packages/phpviet/laravel-omnipay"><img src="https://img.shields.io/packagist/v/phpviet/laravel-omnipay.svg?style=flat-square" alt="Latest version"></a>
    <a href="https://travis-ci.org/phpviet/laravel-omnipay"><img src="https://img.shields.io/travis/phpviet/laravel-omnipay/master.svg?style=flat-square" alt="Build status"></a>
    <a href="https://scrutinizer-ci.com/g/phpviet/laravel-omnipay"><img src="https://img.shields.io/scrutinizer/g/phpviet/laravel-omnipay.svg?style=flat-square" alt="Quantity score"></a>
    <a href="https://styleci.io/repos/189053932"><img src="https://styleci.io/repos/189053932/shield?branch=master" alt="StyleCI"></a>
    <a href="https://packagist.org/packages/phpviet/laravel-omnipay"><img src="https://img.shields.io/packagist/dt/phpviet/laravel-omnipay.svg?style=flat-square" alt="Total download"></a>
    <a href="https://packagist.org/packages/phpviet/laravel-omnipay"><img src="https://img.shields.io/packagist/l/phpviet/laravel-omnipay.svg?style=flat-square" alt="License"></a>
    </p>
</p>

## Thông tin

Laravel Omnipay hổ trợ tích hợp các cổng thanh toán trong nước dựa trên nền tảng [Omnipay League](https://github.com/thephpleague/omnipay).

Để nắm sơ lược về khái niệm và cách sử dụng các **Omnipay** gateways bạn hãy truy cập vào [đây](https://omnipay.thephpleague.com/) 
để kham khảo.

Các cổng thanh toán đang được hổ trợ tích hợp:

+ **[MoMo](https://momo.vn)**
+ **[OnePay](https://onepay.vn)**
+ **[VNPay](https://vnpay.vn)**
+ **[VTCPay](https://vtcpay.vn)**

## Cài đặt

Cài đặt Laravel Omnipay thông qua [Composer](https://getcomposer.org):

```bash
composer require phpviet/laravel-omnipay
```

Sau khi cài đặt xong bạn cần phải publish config file để thiết lập thông số cho cổng thanh toán bạn cần tích hợp, publish thông qua câu lệnh:

```php
php artisan vendor:publish --provider="PHPViet\Laravel\Omnipay\OmnipayServiceProvider" --tag="config"
```

Nội dung file publish nằm trong thư mục `config/laravel-omnipay.php` của bạn như sau:

```php
return [
    // Cấu hình cho các cổng thanh toán tại hệ thống của bạn, các cổng không xài có thể xóa cho gọn hoặc không điền.
    // Các thông số trên có được khi bạn đăng ký tích hợp.
    
    'gateways' => [
        'MoMoAIO' => [
            'driver' => 'MoMo_AllInOne',
            'options' => [
                'accessKey' => '',
                'secretKey' => '',
                'partnerCode' => '',
                'testMode' => false,
            ],
        ],
        'MoMoQRCode' => [
            'driver' => 'MoMo_QRCode',
            'options' => [
                'accessKey' => '',
                'secretKey' => '',
                'partnerCode' => '',
                'testMode' => false,
            ],
        ],
        'MoMoAIA' => [
            'driver' => 'MoMo_AppInApp',
            'options' => [
                'accessKey' => '',
                'secretKey' => '',
                'partnerCode' => '',
                'publicKey' => '',
                'testMode' => false,
            ],
        ],
        'MoMoPOS' => [
            'driver' => 'MoMo_POS',
            'options' => [
                'accessKey' => '',
                'secretKey' => '',
                'partnerCode' => '',
                'publicKey' => '',
                'testMode' => false,
            ],
        ],
        'OnePayDomestic' => [
            'driver' => 'OnePay_Domestic',
            'options' => [
                'vpcMerchant' => '',
                'vpcAccessCode' => '',
                'vpcUser' => '',
                'vpcPassword' => '',
                'vpcHashKey' => '',
                'testMode' => false,
            ],
        ],
        'OnePayInternational' => [
            'driver' => 'OnePay_International',
            'options' => [
                'vpcMerchant' => '',
                'vpcAccessCode' => '',
                'vpcUser' => '',
                'vpcPassword' => '',
                'vpcHashKey' => '',
                'testMode' => false,
            ],
        ],
        'VTCPay' => [
            'driver' => 'VTCPay',
            'options' => [
                'websiteId' => '',
                'securityCode' => '',
                'testMode' => false,
            ],
        ],
        'VNPay' => [
            'driver' => 'VNPay',
            'options' => [
                'vnpTmnCode' => '',
                'vnpHashSecret' => '',
                'testMode' => false,
            ],
        ],
    ],
];
```
## Cách sử dụng

+ [Cổng thanh toán MoMo](/docs/MoMo.md)
+ [Cổng thanh toán OnePay](/docs/OnePay.md)
+ [Cổng thanh toán VNPay](/docs/VNPay.md)
+ [Cổng thanh toán VTCPay](/docs/VTCPay.md)

## Dành cho nhà phát triển

Nếu như bạn cảm thấy thư viện chúng tôi còn thiếu sót hoặc sai sót và bạn muốn đóng góp để phát triển chung, 
chúng tôi rất hoan nghênh! Hãy tạo các `issue` để đóng góp ý tưởng cho phiên bản kế tiếp hoặc tạo `PR` 
để đóng góp phần thiếu sót hoặc sai sót. Riêng đối với các lỗi liên quan đến bảo mật thì phiền bạn gửi email đến
vuongxuongminh@gmail.com thay vì tạo issue. Cảm ơn!
