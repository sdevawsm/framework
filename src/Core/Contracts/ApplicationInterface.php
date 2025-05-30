<?php

namespace Lady\Core\Contracts;

use Lady\Core\Container\Container;
use Lady\Core\ServiceProvider\ServiceProvider;

/**
 * Interface que define o contrato para a classe Application
 */
interface ApplicationInterface
{
    /**
     * Inicializa a aplicação
     */
    public function bootstrap(): void;

    /**
     * Registra um provedor de serviço
     */
    public function register(ServiceProviderInterface $provider): void;

    /**
     * Carrega um provedor de serviço
     */
    public function loadProvider(ServiceProviderInterface $provider): void;

    /**
     * Verifica se um provedor de serviço está registrado
     */
    public function isProviderRegistered(string $provider): bool;

    /**
     * Obtém uma instância do container
     */
    public function getContainer(): Container;

    /**
     * Resolve uma dependência do container
     */
    public function resolve(string $abstract, array $parameters = []): mixed;

    /**
     * Registra uma ligação no container
     */
    public function bind(string $abstract, $concrete = null, bool $shared = false): void;

    /**
     * Registra uma ligação compartilhada no container
     */
    public function singleton(string $abstract, $concrete = null): void;

    /**
     * Obtém a versão do framework
     */
    public function version(): string;

    /**
     * Verifica se a aplicação está em modo de desenvolvimento
     */
    public function isDevelopment(): bool;

    /**
     * Verifica se a aplicação está em modo de produção
     */
    public function isProduction(): bool;
} 