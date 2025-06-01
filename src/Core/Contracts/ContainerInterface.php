<?php

namespace Lady\Core\Contracts;

/**
 * Interface que define o contrato para o container de injeção de dependência
 */
interface ContainerInterface
{
    /**
     * Registra uma ligação no container
     */
    public function bind(string $abstract, $concrete = null, bool $shared = false): void;

    /**
     * Registra uma ligação compartilhada no container
     */
    public function singleton(string $abstract, $concrete = null): void;

    /**
     * Registra um alias para uma ligação
     */
    public function alias(string $abstract, string $alias): void;

    /**
     * Resolve uma dependência do container
     */
    public function resolve(string $abstract, array $parameters = []): mixed;

    /**
     * Verifica se uma ligação existe
     */
    public function has(string $abstract): bool;

    /**
     * Remove uma ligação do container
     */
    public function forget(string $abstract): void;

    /**
     * Limpa todas as ligações e instâncias
     */
    public function flush(): void;

    /**
     * Obtém uma instância do container
     */
    public function get(string $abstract): mixed;

    /**
     * Resolve uma dependência do container
     */
    public function make(string $abstract, array $parameters = []): mixed;
} 