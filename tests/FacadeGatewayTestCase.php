<?php
/**
 * @link https://github.com/phpviet/laravel-omnipay
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Omnipay\Tests;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
abstract class FacadeGatewayTestCase extends TestCase
{
    abstract protected function getGatewayAlias(): string;

    abstract protected function getGatewayName(): string;

    /**
     * @var \Omnipay\Common\AbstractGateway
     */
    protected $gateway;

    protected function setUp(): void
    {
        parent::setUp();
        $this->gateway = $this->getGatewayAlias();
    }

    public function testCanAccessGateway()
    {
        $this->assertSame($this->gateway::getName(), $this->getGatewayName());
        $this->assertSame($this->gateway::getTestMode(), true);
    }
}
