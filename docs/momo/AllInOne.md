<p align="center">
    <a href="https://momo.vn" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/36770798" height="100px">
    </a>
    <h1 align="center">Omnipay MoMo: All In One</h1>
</p>


### Tạo yêu cầu thanh toán:

```php
$response = \MoMoAIO::purchase([
    'amount' => 20000,
    'returnUrl' => 'http://domaincuaban.com/thanh-toan-thanh-cong/',
    'notifyUrl' => 'http://domaincuaban.com/ipn/',
    'orderId' => 'Mã đơn hàng',
    'requestId' => 'Mã request id, gợi ý nên xài uuid4',
])->send();

if ($response->isRedirect()) {
    $redirectUrl = $response->getRedirectUrl();
    
    // TODO: chuyển khách sang trang MoMo để thanh toán
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và MoMo trả về tại [đây](https://developers.momo.vn/#/docs/aio/?id=ph%c6%b0%c6%a1ng-th%e1%bb%a9c-thanh-to%c3%a1n).

### Kiểm tra thông tin `returnUrl` khi khách được MoMo redirect về:

```php
$response = \MoMoAIO::completePurchase()->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả và hiển thị.
    print $response->amount;
    print $response->orderId;
    
    var_dump($response->getData()); // toàn bộ data do MoMo gửi sang.
    
} else {

    print $response->getMessage();
}
```

Hoặc bạn có thể sử dụng `PHPViet\Laravel\Omnipay\Middleware\CompletePurchaseMiddleware` để giảm bớt nghiệp vụ xử lý kiểm tra tính hợp lệ 
của request, xem thêm tại [đây](../common/CompletePurchaseMiddleware.md).

Kham khảo thêm các tham trị khi MoMo trả về tại [đây](https://developers.momo.vn/#/docs/aio/?id=th%c3%b4ng-tin-tham-s%e1%bb%91).

### Kiểm tra thông tin `notifyUrl` do MoMo gửi sang:

```php
$response = \MoMoAIO::notification()->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả và hiển thị.
    print $response->amount;
    print $response->orderId;
    
    var_dump($response->getData()); // toàn bộ data do MoMo gửi sang.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi MoMo gửi sang tại [đây](https://developers.momo.vn/#/docs/aio/?id=th%c3%b4ng-tin-tham-s%e1%bb%91).

### Kiểm tra trạng thái giao dịch:

```php
$response = \MoMoAIO::queryTransaction([
       'orderId' => '123',
       'requestId' => '456',
])->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả và hiển thị.
    print $response->amount;
    print $response->orderId;
    
    var_dump($response->getData()); // toàn bộ data do MoMo gửi về.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và MoMo trả về tại [đây](https://developers.momo.vn/#/docs/aio/?id=ki%e1%bb%83m-tra-tr%e1%ba%a1ng-th%c3%a1i-giao-d%e1%bb%8bch).

### Yêu cầu hoàn tiền:

```php
$response = \MoMoAIO::refund([
    'orderId' => '123',
    'requestId' => '999',
    'transId' => 321,
    'amount' => 50000,
])->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả và hiển thị.
    print $response->amount;
    print $response->orderId;
    
    var_dump($response->getData()); // toàn bộ data do MoMo gửi về.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và MoMo trả về tại [đây](https://developers.momo.vn/#/docs/aio/?id=ho%c3%a0n-ti%e1%bb%81n-giao-d%e1%bb%8bch).

### Kiểm tra trạng thái hoàn tiền:

```php
$response = \MoMoAIO::queryRefund([
     'orderId' => '123',
     'requestId' => '321',
])->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả và hiển thị.
    print $response->amount;
    print $response->orderId;
    
    var_dump($response->getData()); // toàn bộ data do MoMo gửi về.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và MoMo trả về tại [đây](https://developers.momo.vn/#/docs/aio/?id=ki%e1%bb%83m-tra-tr%e1%ba%a1ng-th%c3%a1i-ho%c3%a0n-ti%e1%bb%81n).

### Phương thức hổ trợ debug:

Một số phương thức chung hổ trợ debug khi `isSuccessful()` trả về `FALSE`:

```php
    print $response->getCode(); // mã báo lỗi do MoMo gửi sang.
    print $response->getMessage(); // câu thông báo lỗi do MoMo gửi sang.
```

Kham khảo bảng báo lỗi `getCode()` chi tiết tại [đây](https://developers.momo.vn/#/docs/aio/?id=b%e1%ba%a3ng-m%c3%a3-l%e1%bb%97i).
