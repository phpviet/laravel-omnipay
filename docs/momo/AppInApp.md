<p align="center">
    <a href="https://momo.vn" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/36770798" height="100px">
    </a>
    <h1 align="center">Omnipay MoMo: App In App</h1>
</p>

### Tạo yêu cầu thanh toán:

```php
$response = \MoMoAIA::purchase([
    'customerNumber' => '0909113911',
    'appData' => '999999',
    'partnerRefId' => 99,
    'amount' => 40000,
])->send();

if ($response->isSuccessful()) {
    // TODO: xử lý đơn hàng và tạo request confirm.
    
    print $response->amount;
    
    var_dump($response->getData()); // Trả về toàn bộ dữ liệu do MoMo trả về.
} else {

    print $response->getMessage();
}
```

Kham khảo thêm các tham trị khi tạo yêu cầu và MoMo trả về tại [đây](https://developers.momo.vn/#/docs/app_in_app?id=x%e1%bb%ad-l%c3%bd-thanh-to%c3%a1n).

### Confirm giao dịch:

```php
$response = \MoMoAIA::payConfirm([
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

Kham khảo thêm các tham trị khi tạo yêu cầu và MoMo trả về tại [đây](https://developers.momo.vn/#/docs/app_in_app?id=x%c3%a1c-nh%e1%ba%adn-giao-d%e1%bb%8bch).

### Kiểm tra trạng thái giao dịch:

```php
$response = \MoMoAIA::queryTransaction([
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
$response = \MoMoAIA::refund([
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
