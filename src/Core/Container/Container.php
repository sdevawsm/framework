<?php

namespace Lady\Core\Container;

use Closure;
use ReflectionClass;
use ReflectionParameter;
use InvalidArgumentException;
use Lady\Core\Contracts\ContainerInterface;

/**
 * Container de injeção de dependência
 */
class Container implements ContainerInterface
{
    /**
     * Lista de ligações registradas
     */
    protected array $bindings = [];

    /**
     * Lista de instâncias compartilhadas
     */
    protected array $instances = [];

    /**
     * Lista de aliases
     */
    protected array $aliases = [];

    /**
     * Pilha de resolução
     */
    protected array $resolving = [];

    /**
     * Registra uma ligação no container
     */
    public function bind(string $abstract, $concrete = null, bool $shared = false): void
    {
        $this->bindings[$abstract] = [
            'concrete' => $concrete ?? $abstract,
            'shared' => $shared,
        ];
    }

    /**
     * Registra uma ligação compartilhada no container
     */
    public function singleton(string $abstract, $concrete = null): void
    {
        $this->bind($abstract, $concrete, true);
    }

    /**
     * Registra um alias para uma ligação
     */
    public function alias(string $abstract, string $alias): void
    {
        $this->aliases[$alias] = $abstract;
    }

    /**
     * Resolve uma dependência do container
     */
    public function resolve(string $abstract, array $parameters = []): mixed
    {
        // Resolve alias se existir
        $abstract = $this->getAlias($abstract);

        // Verifica se já existe uma instância compartilhada
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        // Obtém o concreto para a abstração
        $concrete = $this->getConcrete($abstract);

        // Se o concreto for igual à abstração e não for uma classe, retorna o valor
        if ($concrete === $abstract && !class_exists($concrete)) {
            return $concrete;
        }

        // Verifica se é construível
        if ($this->isBuildable($concrete, $abstract)) {
            $object = $this->build($concrete, $parameters);
        } else {
            $object = $this->resolve($concrete, $parameters);
        }

        // Se for compartilhado, armazena a instância
        if (isset($this->bindings[$abstract]['shared']) && $this->bindings[$abstract]['shared']) {
            $this->instances[$abstract] = $object;
        }

        return $object;
    }

    /**
     * Verifica se uma ligação existe
     */
    public function has(string $abstract): bool
    {
        return isset($this->bindings[$abstract]) || isset($this->instances[$abstract]);
    }

    /**
     * Remove uma ligação do container
     */
    public function forget(string $abstract): void
    {
        unset($this->bindings[$abstract], $this->instances[$abstract]);
    }

    /**
     * Limpa todas as ligações e instâncias
     */
    public function flush(): void
    {
        $this->bindings = [];
        $this->instances = [];
        $this->aliases = [];
    }

    /**
     * Obtém o concreto para uma ligação
     */
    protected function getConcrete(string $abstract): mixed
    {
        if (isset($this->bindings[$abstract])) {
            return $this->bindings[$abstract]['concrete'];
        }

        return $abstract;
    }

    /**
     * Verifica se o concreto é construível
     */
    protected function isBuildable($concrete, string $abstract): bool
    {
        return $concrete === $abstract || is_string($concrete) || $concrete instanceof Closure;
    }

    /**
     * Instancia um tipo concreto
     */
    protected function build($concrete, array $parameters = []): mixed
    {
        if ($concrete instanceof Closure) {
            return $concrete($this, $parameters);
        }

        if (!is_string($concrete)) {
            throw new InvalidArgumentException("Concrete must be a string or Closure");
        }

        $reflector = new ReflectionClass($concrete);

        if (!$reflector->isInstantiable()) {
            throw new InvalidArgumentException("Target [$concrete] is not instantiable.");
        }

        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
            return new $concrete;
        }

        $dependencies = $constructor->getParameters();
        $instances = $this->resolveDependencies($dependencies);

        return $reflector->newInstanceArgs($instances);
    }

    /**
     * Resolve as dependências de um método
     */
    protected function resolveDependencies(array $dependencies): array
    {
        $results = [];

        foreach ($dependencies as $dependency) {
            $type = $dependency->getType();

            if ($type && !$type->isBuiltin()) {
                $results[] = $this->resolve($type->getName());
            } else {
                $results[] = $this->resolveNonClass($dependency);
            }
        }

        return $results;
    }

    /**
     * Resolve uma dependência não tipada
     */
    protected function resolveNonClass(ReflectionParameter $parameter): mixed
    {
        if ($parameter->isDefaultValueAvailable()) {
            return $parameter->getDefaultValue();
        }

        // Se não tiver valor padrão e não for uma classe, retorna null
        if (!$parameter->getType() || $parameter->getType()->isBuiltin()) {
            return null;
        }

        throw new InvalidArgumentException("Unresolvable dependency resolving [$parameter]");
    }

    protected function getAlias(string $abstract): string
    {
        return $this->aliases[$abstract] ?? $abstract;
    }

    /**
     * Resolve uma dependência do container (alias para resolve)
     */
    public function make(string $abstract, array $parameters = []): mixed
    {
        return $this->resolve($abstract, $parameters);
    }

    /**
     * Obtém uma instância do container (alias para resolve)
     */
    public function get(string $abstract): mixed
    {
        // Se o valor for uma string simples e não for uma classe, retorna o valor diretamente
        if (isset($this->bindings[$abstract]) && is_string($this->bindings[$abstract]['concrete']) && !class_exists($this->bindings[$abstract]['concrete'])) {
            return $this->bindings[$abstract]['concrete'];
        }
        
        return $this->resolve($abstract);
    }
}
