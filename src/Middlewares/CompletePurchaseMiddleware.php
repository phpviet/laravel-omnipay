<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Middlewares;

use Closure;
use Omnipay\Common\AbstractGateway;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.1.0
 */
class CompletePurchaseMiddleware
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, string $gateway, $failureHandle = null)
    {
        /** @var AbstractGateway $gateway */
        $gateway = app('omnipay')->gateway($gateway);

        if (!$gateway->supportsCompletePurchase()) {
            throw new \InvalidArgumentException('Gateway configured not support complete purchase method!');
        }

        $response = $gateway->completePurchase()->send();

        $request->attributes->set('completePurchaseResponse', $response);

        if (!$response->isSuccessful()) {
            if ($failureHandle) {
                return app()->call($failureHandle, [$response]);
            }

            throw new BadRequestHttpException('Bad request');
        }

        return $next($request);
    }
}
