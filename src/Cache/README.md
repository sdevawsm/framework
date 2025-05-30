# Módulo Cache

## Visão Geral
O módulo Cache do LadyPHP Framework fornece uma interface unificada para diferentes sistemas de cache, suportando múltiplos drivers, tags, prefixos, e operações atômicas, com foco em performance e flexibilidade.

## Componentes

### Cache Manager
- Sistema de cache
- Múltiplos drivers
- Tags
- Prefixos
- Atomicidade

### Drivers
- File Driver
- Redis Driver
- Memcached Driver
- Array Driver
- Database Driver

### Store
- Interface unificada
- Operações atômicas
- TTL (Time To Live)
- Tags
- Prefixos

### Repository
- Cache Repository
- Cache Tags
- Cache Events
- Cache Lock

## Dependências
- PHP 8.1+
- PSR-3 (Logger Interface)
- PSR-4 (Autoloading)
- PSR-16 (Simple Cache)

## Instalação
```bash
composer require lady/framework-cache
```

## Uso Básico
```php
use Lady\Cache\Cache;
use Lady\Cache\Drivers\RedisDriver;

// Configuração
$cache = new Cache();
$cache->setDriver('redis', new RedisDriver([
    'host' => 'localhost',
    'port' => 6379
]));

// Operações básicas
$cache->put('key', 'value', 3600);
$value = $cache->get('key');
$cache->forget('key');

// Tags
$cache->tags(['users', 'posts'])->put('user:1', $user, 3600);
$cache->tags(['users'])->flush();

// Atomicidade
$cache->remember('key', 3600, function() {
    return expensive_operation();
});
```

## Documentação
Para documentação completa, consulte a [Documentação do Cache](docs/cache.md)

## Contribuição
1. Fork o repositório
2. Crie sua feature branch
3. Commit suas mudanças
4. Push para a branch
5. Crie um Pull Request

## Licença
MIT License 