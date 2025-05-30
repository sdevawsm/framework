# LadyPHP Http Module

## Visão Geral

Módulo HTTP do LadyPHP Framework, responsável por gerenciar requisições, respostas, rotas e middlewares.

## Estrutura

```
Http/
├── src/
│   ├── Controllers/   # Controladores base
│   │   ├── Controller.php
│   │   └── ResourceController.php
│   ├── Middleware/    # Middlewares
│   │   ├── Middleware.php
│   │   └── MiddlewareStack.php
│   └── Routing/       # Sistema de rotas
│       ├── Router.php
│       └── Route.php
├── tests/            # Testes unitários
├── composer.json     # Dependências
└── README.md         # Este arquivo
```

## Dependências

- lady-php/support: ^1.0
- symfony/http-foundation: ^6.0
- symfony/routing: ^6.0

## Funcionalidades

1. **Sistema de Rotas**
   - Rotas nomeadas
   - Grupos de rotas
   - Middleware por rota
   - Validação de parâmetros

2. **Controladores**
   - Controlador base
   - Resource controller
   - Injeção de dependência
   - Respostas padronizadas

3. **Middleware**
   - Pipeline de middleware
   - Middleware globais
   - Middleware por grupo
   - Middleware por rota

## Equipe Responsável

- **Líder**: [Nome do Líder]
- **Desenvolvedores**: [Lista de Desenvolvedores]
- **QA**: [Responsável QA]

## Desenvolvimento

1. Clone o repositório
2. Instale as dependências: `composer install`
3. Execute os testes: `composer test`
4. Verifique o código: `composer phpstan`

## Convenções

1. **Namespaces**: `LadyPHP\Http`
2. **Testes**: Cobertura mínima de 80%
3. **Documentação**: PHPDoc em todas as classes

## Integração

Para usar este módulo em seu projeto:

```php
use LadyPHP\Http\Router;

$router = new Router();
$router->get('/users', [UserController::class, 'index'])->name('users.index');
$router->post('/users', [UserController::class, 'store'])->name('users.store');
```

## Licença

MIT License 