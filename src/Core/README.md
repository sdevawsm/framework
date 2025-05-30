# Módulo Core

## Visão Geral
O módulo Core é o núcleo fundamental do LadyPHP Framework, responsável por fornecer as funcionalidades essenciais que outros módulos dependerão.

## Componentes

### Application
- Classe principal do framework
- Responsável pelo bootstrap da aplicação
- Gerenciamento do ciclo de vida da aplicação

### Container
- Container de Injeção de Dependência
- Gerenciamento de serviços
- Resolução de dependências

### Config
- Gerenciamento de configurações
- Carregamento de arquivos de configuração
- Cache de configurações

### Environment
- Gerenciamento de variáveis de ambiente
- Validação de ambiente
- Helpers de ambiente

## Dependências
- PHP 8.1+
- PSR-11 (Container Interface)
- PSR-4 (Autoloading)

## Instalação
```bash
composer require lady/framework-core
```

## Uso Básico
```php
use Lady\Core\Application;

$app = new Application();

// Configurar ambiente
$app->environment('production');

// Registrar serviços
$app->register(ServiceProvider::class);

// Iniciar aplicação
$app->bootstrap();
```

## Documentação
Para documentação completa, consulte a [Documentação do Core](docs/core.md)

## Contribuição
1. Fork o repositório
2. Crie sua feature branch
3. Commit suas mudanças
4. Push para a branch
5. Crie um Pull Request

## Licença
MIT License 