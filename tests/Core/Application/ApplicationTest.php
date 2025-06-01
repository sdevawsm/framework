<?php

namespace Lady\Tests\Core\Application;

use Lady\Core\Application\Application;
use Lady\Core\Container\Container;
use Lady\Core\Contracts\ApplicationInterface;
use Lady\Core\Contracts\ServiceProviderInterface;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    private Application $app;

    protected function setUp(): void
    {
        $this->app = new Application();
    }

    public function testApplicationVersion(): void
    {
        $this->assertEquals('1.0.0', $this->app->version());
    }

    public function testGetContainer(): void
    {
        $container = $this->app->getContainer();
        $this->assertInstanceOf(Container::class, $container);
    }

    public function testEnvironmentDetection(): void
    {
        // Configura o ambiente para desenvolvimento
        $this->app->getContainer()->bind('env', 'development');
        $this->assertTrue($this->app->isDevelopment());
        $this->assertFalse($this->app->isProduction());

        // Configura o ambiente para produção
        $this->app->getContainer()->bind('env', 'production');
        $this->assertFalse($this->app->isDevelopment());
        $this->assertTrue($this->app->isProduction());
    }

    public function testServiceProviderRegistration(): void
    {
        $provider = $this->createMock(ServiceProviderInterface::class);
        $provider->expects($this->once())
            ->method('register');

        $this->app->register($provider);
        $this->assertTrue($this->app->isProviderRegistered(get_class($provider)));
    }

    public function testServiceProviderNotRegisteredTwice(): void
    {
        $provider = $this->createMock(ServiceProviderInterface::class);
        $provider->expects($this->once())
            ->method('register');

        $this->app->register($provider);
        $this->app->register($provider); // Segunda chamada não deve executar register()
    }

    public function testLoadProvider(): void
    {
        $provider = $this->createMock(ServiceProviderInterface::class);
        $provider->expects($this->once())
            ->method('register');

        $this->app->loadProvider($provider);
        $this->assertTrue($this->app->isProviderRegistered(get_class($provider)));
    }

    public function testBindAndResolve(): void
    {
        $this->app->bind('test', function () {
            return new \stdClass();
        });

        $instance1 = $this->app->resolve('test');
        $instance2 = $this->app->resolve('test');

        $this->assertInstanceOf(\stdClass::class, $instance1);
        $this->assertInstanceOf(\stdClass::class, $instance2);
        $this->assertNotSame($instance1, $instance2); // Instâncias diferentes
    }

    public function testSingleton(): void
    {
        $this->app->singleton('test', function () {
            return new \stdClass();
        });

        $instance1 = $this->app->resolve('test');
        $instance2 = $this->app->resolve('test');

        $this->assertInstanceOf(\stdClass::class, $instance1);
        $this->assertInstanceOf(\stdClass::class, $instance2);
        $this->assertSame($instance1, $instance2); // Mesma instância
    }

    public function testBootstrap(): void
    {
        $this->app->bootstrap();

        // Verifica se o container foi inicializado
        $this->assertInstanceOf(Container::class, $this->app->getContainer());

        // Verifica se a aplicação foi marcada como inicializada
        $this->assertTrue($this->app->isBooted());
    }
} 