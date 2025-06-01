<?php

namespace Lady\Core\Application;

use Lady\Core\Container\Container;
use Lady\Core\Contracts\ApplicationInterface;
use Lady\Core\Contracts\ServiceProviderInterface;

/**
 * Classe principal do framework LadyPHP
 * 
 * Responsável por inicializar e gerenciar a aplicação
 */
class Application implements ApplicationInterface
{
    /**
     * Versão do framework
     */
    const VERSION = '1.0.0';

    /**
     * Container de injeção de dependência
     */
    protected Container $container;

    /**
     * Lista de provedores de serviço registrados
     */
    protected array $serviceProviders = [];

    /**
     * Lista de provedores de serviço carregados
     */
    protected array $loadedProviders = [];

    /**
     * Construtor da aplicação
     */
    public function __construct()
    {
        $this->container = new Container();
        $this->registerBaseBindings();
    }

    /**
     * Registra as ligações base da aplicação
     */
    protected function registerBaseBindings(): void
    {
        $this->container->singleton('app', $this);
        $this->container->singleton(ApplicationInterface::class, $this);
    }

    /**
     * Inicializa a aplicação
     */
    public function bootstrap(): void
    {
        // TODO: Implementar inicialização da aplicação
    }

    /**
     * Registra um provedor de serviço
     */
    public function register(ServiceProviderInterface $provider): void
    {
        if ($this->isProviderRegistered(get_class($provider))) {
            return;
        }

        $provider->register();
        $this->serviceProviders[] = $provider;
        $this->loadedProviders[get_class($provider)] = true;
    }

    /**
     * Carrega um provedor de serviço
     */
    public function loadProvider(ServiceProviderInterface $provider): void
    {
        if (!$this->isProviderRegistered(get_class($provider))) {
            $this->register($provider);
        }
    }

    /**
     * Verifica se um provedor de serviço está registrado
     */
    public function isProviderRegistered(string $provider): bool
    {
        return isset($this->loadedProviders[$provider]);
    }

    /**
     * Obtém uma instância do container
     */
    public function getContainer(): Container
    {
        return $this->container;
    }

    /**
     * Resolve uma dependência do container
     */
    public function resolve(string $abstract, array $parameters = []): mixed
    {
        return $this->container->make($abstract, $parameters);
    }

    /**
     * Registra uma ligação no container
     */
    public function bind(string $abstract, $concrete = null, bool $shared = false): void
    {
        $this->container->bind($abstract, $concrete, $shared);
    }

    /**
     * Registra uma ligação compartilhada no container
     */
    public function singleton(string $abstract, $concrete = null): void
    {
        $this->container->singleton($abstract, $concrete);
    }

    /**
     * Obtém a versão do framework
     */
    public function version(): string
    {
        return self::VERSION;
    }

    /**
     * Verifica se a aplicação está em modo de desenvolvimento
     */
    public function isDevelopment(): bool
    {
        return $this->container->get('env') === 'development';
    }

    /**
     * Verifica se a aplicação está em modo de produção
     */
    public function isProduction(): bool
    {
        return $this->container->get('env') === 'production';
    }
}
