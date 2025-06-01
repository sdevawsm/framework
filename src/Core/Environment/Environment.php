<?php

namespace Lady\Core\Environment;

use Lady\Core\Contracts\EnvironmentInterface;

class Environment implements EnvironmentInterface
{
    /**
     * Array de variáveis de ambiente
     */
    protected array $variables = [];

    /**
     * Cria uma nova instância do gerenciador de ambiente
     */
    public function __construct()
    {
        $this->loadEnvironmentFile();
    }

    /**
     * Carrega o arquivo .env
     */
    protected function loadEnvironmentFile(): void
    {
        $envFile = $this->getEnvironmentFilePath();

        if (file_exists($envFile)) {
            $this->loadEnvironmentVariables($envFile);
        }
    }

    /**
     * Obtém o caminho do arquivo .env
     */
    protected function getEnvironmentFilePath(): string
    {
        return getcwd() . '/.env';
    }

    /**
     * Carrega as variáveis do arquivo .env
     */
    protected function loadEnvironmentVariables(string $file): void
    {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            // Ignora comentários
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = $this->parseEnvironmentVariable($line);
            
            if ($name !== null) {
                $this->variables[$name] = $value;
                putenv("$name=$value");
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }

    /**
     * Analisa uma linha de variável de ambiente
     */
    protected function parseEnvironmentVariable(string $line): array
    {
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            // Remove aspas se existirem
            if (strpos($value, '"') === 0 || strpos($value, "'") === 0) {
                $value = substr($value, 1, -1);
            }

            return [$name, $value];
        }

        return [null, null];
    }

    /**
     * Obtém uma variável de ambiente
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->variables[$key] ?? $default;
    }

    /**
     * Define uma variável de ambiente
     */
    public function set(string $key, mixed $value): void
    {
        $this->variables[$key] = $value;
        putenv("$key=$value");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }

    /**
     * Verifica se uma variável de ambiente existe
     */
    public function has(string $key): bool
    {
        return isset($this->variables[$key]);
    }

    /**
     * Remove uma variável de ambiente
     */
    public function forget(string $key): void
    {
        unset($this->variables[$key]);
        putenv($key);
        unset($_ENV[$key]);
        unset($_SERVER[$key]);
    }

    /**
     * Retorna todas as variáveis de ambiente
     */
    public function all(): array
    {
        return $this->variables;
    }
} 