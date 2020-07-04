<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Middleware;

use Closure;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Exception\OmnipayException;
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
    public function handle($request, Closure $next, string $gateway)
    {
        /** @var AbstractGateway $gateway */
        $gateway = app('omnipay')->gateway($gateway);

        if (! $gateway->supportsCompletePurchase()) {
            throw new \InvalidArgumentException('Gateway configured not support complete purchase method!');
        }

        try {
            $response = $gateway->completePurchase()->send();
        } catch (OmnipayException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        $request->attributes->set('completePurchaseResponse', $response);

        return $next($request);
    }
}
