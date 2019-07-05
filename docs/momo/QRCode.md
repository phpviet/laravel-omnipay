<p align="center">
    <a href="https://momo.vn" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/36770798" height="100px">
    </a>
    <h1 align="center">Omnipay MoMo: QRCode</h1>
</p>

### Kiểm tra thông tin `notifyUrl` do MoMo gửi sang:

```php
$response = \MoMoQRCode::notification()->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả và confirm giao dịch với MoMo.
    
    print $response->amount;
    print $response->partnerRefId;
    
    var_dump($response->getData()); // toàn bộ data do MoMo gửi sang.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi MoMo gửi sang tại [đây](https://developers.momo.vn/#/docs/qr_payment?id=x%e1%bb%ad-l%c3%bd-thanh-to%c3%a1n).

### Confirm giao dịch:

```php
$response = \MoMoQRCode::payConfirm([
    "partnerRefId" => "Merchant123556666",
    "requestType" => "capture",
    "requestId" => "1512529262248",
    "momoTransId" => "12436514111",
    "customerNumber" => "0963181714",
])->send();

if ($response->isSuccessful()) {
    // TODO: trả về response cho MoMo
    
    print $response->amount;
    
    var_dump($response->getData()); // Trả về toàn bộ dữ liệu do MoMo trả về.
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và MoMo trả về tại [đây](https://developers.momo.vn/#/docs/qr_payment?id=x%c3%a1c-nh%e1%ba%adn-giao-d%e1%bb%8bch).

### Kiểm tra trạng thái giao dịch:

```php
$response = \MoMoQRCode::queryTransaction([
       'partnerRefId' => '123',
       'requestId' => '456',
])->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả.
    print $response->data['amount'];
    
    var_dump($response->getData()); // toàn bộ data do MoMo gửi về.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và MoMo trả về tại [đây](https://developers.momo.vn/#/docs/query_status?id=tra-c%e1%bb%a9u-giao-d%e1%bb%8bch).

### Yêu cầu hoàn tiền:

```php
$response = \MoMoQRCode::refund([
    'partnerRefId' => '123',
    'requestId' => '999',
    'momoTransId' => 321,
    'amount' => 50000,
])->send();

if ($response->isSuccessful()) {
    // TODO: xử lý kết quả.
    print $response->amount;
    
    var_dump($response->getData()); // toàn bộ data do MoMo gửi về.
    
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và MoMo trả về tại [đây](https://developers.momo.vn/#/docs/refund?id=ho%c3%a0n-ti%e1%bb%81n-giao-d%e1%bb%8bch).

### Phương thức hổ trợ debug:

Một số phương thức chung hổ trợ debug khi `isSuccessful()` trả về `FALSE`:

```php
    print $response->getCode(); // mã báo lỗi do MoMo gửi sang.
    print $response->getMessage(); // câu thông báo lỗi do MoMo gửi sang.
```

Kham khảo bảng báo lỗi `getCode()` chi tiết tại [đây](https://developers.momo.vn/#/docs/error_code?id=c%c3%a1c-m%c3%a3-l%e1%bb%97i-th%c6%b0%e1%bb%9dng-g%e1%ba%b7p).
