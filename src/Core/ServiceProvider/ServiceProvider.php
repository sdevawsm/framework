<?php

namespace Lady\Core\ServiceProvider;

use Lady\Core\Contracts\ApplicationInterface;
use Lady\Core\Contracts\ServiceProviderInterface;

/**
 * Classe base para provedores de serviço
 */
abstract class ServiceProvider implements ServiceProviderInterface
{
    /**
     * Instância da aplicação
     */
    protected ApplicationInterface $app;

    /**
     * Indica se o provedor está registrado
     */
    protected bool $registered = false;

    /**
     * Indica se o provedor está inicializado
     */
    protected bool $booted = false;

    /**
     * Construtor do provedor de serviço
     */
    public function __construct(ApplicationInterface $app)
    {
        $this->app = $app;
    }

    /**
     * Registra os serviços do provedor
     */
    abstract public function register(): void;

    /**
     * Inicializa os serviços do provedor
     */
    public function boot(): void
    {
        // TODO: Implementar inicialização dos serviços
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