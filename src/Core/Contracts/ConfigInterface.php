<?php

namespace Lady\Core\Contracts;

/**
 * Interface que define o contrato para o gerenciador de configurações
 */
interface ConfigInterface
{
    /**
     * Carrega as configurações de um arquivo
     */
    public function load(string $file): void;

    /**
     * Obtém uma configuração
     */
    public function get(string $key, mixed $default = null): mixed;

    /**
     * Define uma configuração
     */
    public function set(string $key, mixed $value): void;

    /**
     * Verifica se uma configuração existe
     */
    public function has(string $key): bool;

    /**
     * Remove uma configuração
     */
    public function forget(string $key): void;

    /**
     * Limpa todas as configurações
     */
    public function clear(): void;

    /**
     * Obtém todas as configurações
     */
    public function all(): array;

    /**
     * Carrega configurações do cache
     */
    public function loadFromCache(): void;

    /**
     * Salva configurações no cache
     */
    public function saveToCache(): void;
} 