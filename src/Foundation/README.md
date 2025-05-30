# Módulo Foundation

## Visão Geral
O módulo Foundation é a base do LadyPHP Framework, fornecendo interfaces, exceções e utilitários fundamentais que serão utilizados por todos os outros módulos.

## Componentes

### Contracts
- Interfaces principais do framework
- Contratos de serviços
- Contratos de componentes

### Exceptions
- Exceções base do framework
- Handlers de exceção
- Formatação de erros

### ServiceProvider
- Provedor de serviços base
- Registro de serviços
- Boot de serviços

### Support
- Helpers e utilitários
- Funções auxiliares
- Classes de suporte

## Dependências
- PHP 8.1+
- PSR-3 (Logger Interface)
- PSR-4 (Autoloading)

## Instalação
```bash
composer require lady/framework-foundation
```

## Uso Básico
```php
use Lady\Foundation\ServiceProvider;
use Lady\Foundation\Contracts\ServiceProviderInterface;

class MyServiceProvider extends ServiceProvider implements ServiceProviderInterface
{
    public function register(): void
    {
        // Registrar serviços
    }

    public function boot(): void
    {
        // Inicializar serviços
    }
}
```

## Documentação
Para documentação completa, consulte a [Documentação do Foundation](docs/foundation.md)

## Contribuição
1. Fork o repositório
2. Crie sua feature branch
3. Commit suas mudanças
4. Push para a branch
5. Crie um Pull Request

## Licença
MIT License 