<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay;

use Illuminate\Support\ServiceProvider;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class OmnipayServiceProvider extends ServiceProvider
{
    /**
     * Boot package services.
     */
    public function boot(): void
    {
        $this->publishConfigs();
    }

    /**
     * Publish package service configs.
     */
    protected function publishConfigs(): void
    {
        $this->publishes([
            __DIR__.'/../config/laravel-omnipay.php' => $this->app->configPath('laravel-omnipay.php'),
        ], 'config');
    }
}
