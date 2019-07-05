<p align="center">
    <a href="https://vnpay.vn" target="_blank">
        <img src="https://raw.githubusercontent.com/phpviet/omnipay-vnpay/master/resources/logo.png">
    </a>
    <h1 align="center">Omnipay: VNPay</h1>
</p>

Package này cung cấp cho bạn facade `VNPay` để tương tác với cổng thanh toán.

### Tạo yêu cầu thanh toán:

```php
$response = \VNPay::purchase([
    'vnp_TxnRef' => time(),
    'vnp_OrderType' => 100000,
    'vnp_OrderInfo' => time(),
    'vnp_IpAddr' => '127.0.0.1',
    'vnp_Amount' => 1000000,
    'vnp_ReturnUrl' => 'https://github.com/phpviet',
])->send();

if ($response->isRedirect()) {
    $redirectUrl = $response->getRedirectUrl();
    
    // TODO: chuyển khách sang trang VNPay để thanh toán
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và VNPay trả về tại [đây](https://sandbox.vnpayment.vn/apis/docs/huong-dan-tich-hop/#t%E1%BA%A1o-url-thanh-to%C3%A1n).


### Kiểm tra thông tin `vnp_ReturnUrl` khi khách được VNPay redirect về:

```php
$response = \VNPay::completePurchase()->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả và hiển thị.
    print $response->vnp_Amount;
    print $response->vnp_TxnRef;
    
    var_dump($response->getData()); // toàn bộ data do VNPay gửi sang.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi VNPay trả về tại [đây](https://sandbox.vnpayment.vn/apis/docs/huong-dan-tich-hop/#code-returnurl).

### Kiểm tra thông tin `IPN` do VNPay gửi sang:

```php
$response = \VNPay::notification()->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả.
    print $response->vnp_Amount;
    print $response->vnp_TxnRef;
    
    var_dump($response->getData()); // toàn bộ data do VNPay gửi sang.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi VNPay gửi sang tại [đây](https://sandbox.vnpayment.vn/apis/docs/huong-dan-tich-hop/#code-ipn-url).

### Kiểm tra trạng thái giao dịch:

```php
$response = \VNPay::queryTransaction([
    'vnp_TransDate' => 20190705151126,
    'vnp_TxnRef' => 1562314234,
    'vnp_OrderInfo' => time(),
    'vnp_IpAddr' => '127.0.0.1',
    'vnp_TransactionNo' => 496558,
])->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả và hiển thị.
    print $response->getTransactionId();
    print $response->getTransactionReference();
    
    var_dump($response->getData()); // toàn bộ data do VNPay gửi về.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và VNPay trả về tại [đây](https://goo.gl/FHdM5B).

### Yêu cầu hoàn tiền:

```php
$response = \VNPay::refund([
    'vnp_Amount' => 10000,
    'vnp_TransactionType' => '03',
    'vnp_TransDate' => 20190705151126,
    'vnp_TxnRef' => 32321,
    'vnp_OrderInfo' => time(),
    'vnp_IpAddr' => '127.0.0.1',
    'vnp_TransactionNo' => 496558,
])->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả và hiển thị.
    print $response->getTransactionId();
    print $response->getTransactionReference();
    
    var_dump($response->getData()); // toàn bộ data do VNPay gửi về.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và VNPay trả về tại [đây](https://goo.gl/FHdM5B).
