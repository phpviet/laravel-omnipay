<p align="center">
    <a href="https://vtcpay.vn" target="_blank">
        <img src="https://raw.githubusercontent.com/phpviet/omnipay-vtcpay/master/resources/logo.png">
    </a>
    <h1 align="center">Omnipay: VTCPay</h1>
</p>

Package này cung cấp cho bạn facade `VTCPay` để tương tác với cổng thanh toán.


### Tạo yêu cầu thanh toán:

```php
$response = \VTCPay::purchase([
    'receiver_account' => '0963465816',
    'reference_number' => microtime(false),
    'amount' => 50000,
    'url_return' => 'https://phpviet.org'
])->send();

if ($response->isRedirect()) {
    $redirectUrl = $response->getRedirectUrl();
    
    // TODO: chuyển khách sang trang VTCPay để thanh toán
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và VTCPay trả về tại [đây](https://vtcpay.vn/tai-lieu-tich-hop-website).

### Kiểm tra thông tin `url_return` khi khách được VTCPay redirect về:

```php
$response = \VTCPay::completePurchase()->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả và hiển thị.
    print $response->amount;
    print $response->reference_number;
    
    var_dump($response->getData()); // toàn bộ data do VTCPay gửi sang.
    
} else {

    print $response->getMessage();
}
```

Hoặc bạn có thể sử dụng `PHPViet\Laravel\Omnipay\Middleware\CompletePurchaseMiddleware` để giảm bớt nghiệp vụ xử lý kiểm tra tính hợp lệ 
của request, xem thêm tại [đây](common/CompletePurchaseMiddleware.md).

Kham khảo thêm các tham trị khi VTCPay trả về tại [đây](https://vtcpay.vn/tai-lieu-tich-hop-website).


### Kiểm tra thông tin `IPN` do VTCPay gửi sang:

```php
$response = \VTCPay::notification()->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả.
    print $response->amount;
    print $response->reference_number;
    
    var_dump($response->getData()); // toàn bộ data do VTCPay gửi sang.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi VTCPay gửi sang tại [đây](https://vtcpay.vn/tai-lieu-tich-hop-website).
