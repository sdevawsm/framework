<?php

namespace Lady\Core\Contracts;

/**
 * Interface que define o contrato para os provedores de serviço
 */
interface ServiceProviderInterface
{
    /**
     * Registra os serviços do provedor
     *
     * @return void
     */
    public function register(): void;

    /**
     * Inicializa os serviços do provedor
     *
     * @return void
     */
    public function boot(): void;

    /**
     * Verifica se o provedor está registrado
     */
    public function isRegistered(): bool;

    /**
     * Verifica se o provedor está inicializado
     */
    public function isBooted(): bool;

    /**
     * Obtém o nome do provedor
     */
    public function getName(): string;
} 