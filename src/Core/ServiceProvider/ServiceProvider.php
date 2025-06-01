<?php

namespace Lady\Core\ServiceProvider;

use Lady\Core\Application\Application;
use Lady\Core\Contracts\ApplicationInterface;
use Lady\Core\Contracts\ServiceProviderInterface;

/**
 * Classe base para provedores de serviço
 */
abstract class ServiceProvider implements ServiceProviderInterface
{
    /**
     * A instância da aplicação
     */
    protected Application $app;

    /**
     * Indica se o provedor está registrado
     */
    protected bool $registered = false;

    /**
     * Indica se o provedor está inicializado
     */
    protected bool $booted = false;

    /**
     * Cria uma nova instância do provedor de serviço
     */
    public function __construct(ApplicationInterface $app)
    {
        $this->app = $app;
    }

    /**
     * Registra os serviços do provedor
     */
    public function register(): void
    {
        // Implementação padrão vazia
    }

    /**
     * Inicializa os serviços do provedor
     */
    public function boot(): void
    {
        // Implementação padrão vazia
    }

    /**
     * Verifica se o provedor está registrado
     */
    public function isRegistered(): bool
    {
        return $this->registered;
    }

    /**
     * Verifica se o provedor está inicializado
     */
    public function isBooted(): bool
    {
        return $this->booted;
    }

    /**
     * Obtém o nome do provedor
     */
    public function getName(): string
    {
        return static::class;
    }

    /**
     * Registra uma ligação no container
     */
    protected function bind(string $abstract, $concrete = null, bool $shared = false): void
    {
        $this->app->bind($abstract, $concrete, $shared);
    }

    /**
     * Registra uma ligação compartilhada no container
     */
    protected function singleton(string $abstract, $concrete = null): void
    {
        $this->app->singleton($abstract, $concrete);
    }

    /**
     * Resolve uma dependência do container
     */
    protected function resolve(string $abstract, array $parameters = []): mixed
    {
        return $this->app->resolve($abstract, $parameters);
    }
} 