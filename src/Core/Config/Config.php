<?php

namespace Lady\Core\Config;

use Lady\Core\Contracts\ConfigInterface;

/**
 * Gerenciador de configurações do framework
 */
class Config implements ConfigInterface
{
    /**
     * Array de configurações
     */
    protected array $config = [];

    /**
     * Cache de configurações
     */
    protected array $cache = [];

    /**
     * Cria uma nova instância de configuração
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /**
     * Carrega configurações de um arquivo
     */
    public function load(string $path): void
    {
        if (file_exists($path)) {
            $config = require $path;
            if (is_array($config)) {
                $this->config = array_merge($this->config, $config);
            }
        }
    }

    /**
     * Obtém um item de configuração
     */
    public function get(string $key, mixed $default = null): mixed
    {
        if (is_null($key)) {
            return $this->config;
        }

        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        foreach (explode('.', $key) as $segment) {
            if (!is_array($this->config) || !array_key_exists($segment, $this->config)) {
                return $default;
            }
            $this->config = $this->config[$segment];
        }

        return $this->config;
    }

    /**
     * Define um item de configuração
     */
    public function set(string $key, mixed $value): void
    {
        $keys = explode('.', $key);
        $config = &$this->config;

        while (count($keys) > 1) {
            $key = array_shift($keys);
            if (!isset($config[$key]) || !is_array($config[$key])) {
                $config[$key] = [];
            }
            $config = &$config[$key];
        }

        $config[array_shift($keys)] = $value;
    }

    /**
     * Verifica se um item de configuração existe
     */
    public function has(string $key): bool
    {
        return !is_null($this->get($key));
    }

    /**
     * Remove uma configuração
     */
    public function forget(string $key): void
    {
        $keys = explode('.', $key);
        $config = &$this->config;

        while (count($keys) > 1) {
            $key = array_shift($keys);
            if (!isset($config[$key])) {
                return;
            }
            $config = &$config[$key];
        }

        unset($config[array_shift($keys)]);
    }

    /**
     * Limpa todas as configurações
     */
    public function clear(): void
    {
        $this->config = [];
        $this->cache = [];
    }

    /**
     * Retorna todas as configurações
     */
    public function all(): array
    {
        return $this->config;
    }

    /**
     * Carrega configurações do cache
     */
    public function loadFromCache(): void
    {
        if (!empty($this->cache)) {
            $this->config = array_merge($this->config, $this->cache);
        }
    }

    /**
     * Salva configurações no cache
     */
    public function saveToCache(): void
    {
        $this->cache = $this->config;
    }
}
