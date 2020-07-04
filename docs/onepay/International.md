<p align="center">
    <a href="https://onepay.vn" target="_blank">
        <img src="https://raw.githubusercontent.com/phpviet/omnipay-onepay/master/resources/logo.png">
    </a>
    <h1 align="center">Omnipay OnePay: International</h1>
</p>

### Tạo yêu cầu thanh toán:

```php
$response = \OnePayInternational::purchase([
    'AgainLink' => 'https://github.com/phpviet',
    'vpc_MerchTxnRef' => microtime(false),
    'vpc_ReturnURL' => 'https://github.com/phpviet',
    'vpc_TicketNo' => '127.0.0.1',
    'vpc_Amount' => '200000',
    'vpc_OrderInfo' => 456,
])->send();

if ($response->isRedirect()) {
    $redirectUrl = $response->getRedirectUrl();
    
    // TODO: chuyển khách sang trang OnePay để thanh toán
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và OnePay trả về tại [đây](https://mtf.onepay.vn/developer/resource/documents/docx/quy_trinh_tich_hop-noidia.pdf).

### Kiểm tra thông tin `vpc_ReturnURL` khi khách được OnePay redirect về:

```php
$response = \OnePayInternational::completePurchase()->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả và hiển thị.
    print $response->vpc_Amount;
    print $response->vpc_MerchTxnRef;
    
    var_dump($response->getData()); // toàn bộ data do OnePay gửi sang.
    
} else {

    print $response->getMessage();
}
```

Hoặc bạn có thể sử dụng `PHPViet\Laravel\Omnipay\Middleware\CompletePurchaseMiddleware` để giảm bớt nghiệp vụ xử lý kiểm tra tính hợp lệ 
của request, xem thêm tại [đây](../common/CompletePurchaseMiddleware.md).

Kham khảo thêm các tham trị khi OnePay trả về tại [đây](https://mtf.onepay.vn/developer/resource/documents/docx/quy_trinh_tich_hop-noidia.pdf).

### Kiểm tra thông tin `IPN` do OnePay gửi sang:

```php
$response = \OnePayInternational::notification()->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả và hiển thị.
    print $response->vpc_Amount;
    print $response->vpc_MerchTxnRef;
    
    var_dump($response->getData()); // toàn bộ data do OnePay gửi sang.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi OnePay gửi sang tại [đây](https://mtf.onepay.vn/developer/resource/documents/docx/quy_trinh_tich_hop-noidia.pdf).

### Kiểm tra trạng thái giao dịch:

```php
$response = \OnePayInternational::queryTransaction([
    'vpc_MerchTxnRef' => '123',
])->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả và hiển thị.

    var_dump($response->getData()); // toàn bộ data do OnePay gửi về.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và OnePay trả về tại [đây](https://mtf.onepay.vn/developer/resource/documents/docx/quy_trinh_tich_hop-noidia.pdf).

### Phương thức hổ trợ debug:

Một số phương thức chung hổ trợ debug khi `isSuccessful()` trả về `FALSE`:

```php
    print $response->getCode(); // mã báo lỗi do OnePay gửi sang.
    print $response->getMessage(); // câu thông báo lỗi do OnePay gửi sang.
```

Kham khảo bảng báo lỗi `getCode()` chi tiết tại [đây](https://mtf.onepay.vn/developer/resource/documents/docx/quy_trinh_tich_hop-noidia.pdf).
