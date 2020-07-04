Complete purchase middleware
==================================================

Lớp `PHPViet\Laravel\Omnipay\Middleware\CompletePurchaseMiddleware` là một [route middleware](https://laravel.com/docs/7.x/middleware#assigning-middleware-to-routes) giúp bạn
giảm bớt nghiệp vụ xác thực phiên giao dịch của khách có thành công hay không hay có phải là do nhà cung cấp dịch vụ gửi về hay không, thay vào đó bạn chỉ cần tập trung vào xử lý
nghiệp vụ khi thanh toán thành công hoặc thất bại.
 
Để sử dụng middleware này thì bạn cần khai báo nó vào `routeMiddleware`:

```php
// Within App\Http\Kernel Class...

    protected $routeMiddleware = [
        'completePurchase' => \PHPViet\Laravel\Omnipay\Middleware\CompletePurchaseMiddleware::class
    ];
```

Và gắn nó vào route đảm nhiệm nghiệp vụ khi nhà cung cấp dịch vụ redirect khách về site của bạn
ví dụ: 

```php
    Route::get('/complete-purchase', function (\Illuminate\Http\Request $request) {
        /** @var \Omnipay\Common\Message\ResponseInterface $completePurchaseResponse */
        $completePurchaseResponse = $request->attributes->get('completePurchaseResponse');
        
        if ($completePurchaseResponse->isSuccessful()) {
          // xử lý logic thanh toán thành công.
        } elseif ($completePurchaseResponse->isCancelled()) {
          // khi khách hủy giao dịch.
        } else {
          // các trường hợp khác
        }   

    })->middleware('completePurchase:MoMoAIO');
```

Parameter truyền vào middleware chính là gateway name của bạn ở ví dụ trên nó là `MoMoAIO` gateway.
