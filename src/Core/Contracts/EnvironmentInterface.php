<?php

namespace Lady\Core\Contracts;

/**
 * Interface que define o contrato para o gerenciador de variáveis de ambiente
 */
interface EnvironmentInterface
{
    /**
     * Carrega as variáveis de ambiente de um arquivo
     */
    public function load(string $file): void;

    /**
     * Obtém uma variável de ambiente
     */
    public function get(string $key, mixed $default = null): mixed;

    /**
     * Define uma variável de ambiente
     */
    public function set(string $key, mixed $value): void;

    /**
     * Verifica se uma variável de ambiente existe
     */
    public function has(string $key): bool;

    /**
     * Remove uma variável de ambiente
     */
    public function forget(string $key): void;

    /**
     * Limpa todas as variáveis de ambiente
     */
    public function clear(): void;

    /**
     * Retorna todas as variáveis de ambiente
     */
    public function all(): array;

    /**
     * Valida as variáveis de ambiente
     */
    public function validate(): bool;

    /**
     * Obtém o ambiente atual
     */
    public function getEnvironment(): string;

    /**
     * Verifica se o ambiente é de desenvolvimento
     */
    public function isDevelopment(): bool;

    /**
     * Verifica se o ambiente é de produção
     */
    public function isProduction(): bool;

    /**
     * Verifica se o ambiente é de teste
     */
    public function isTesting(): bool;
} 