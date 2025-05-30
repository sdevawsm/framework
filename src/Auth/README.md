# LadyPHP Auth Module

## Visão Geral

Módulo de autenticação do LadyPHP Framework, responsável por gerenciar autenticação de usuários, tokens JWT e guards.

## Estrutura

```
Auth/
├── src/
│   ├── Contracts/     # Interfaces
│   │   ├── Guard.php
│   │   └── UserProvider.php
│   ├── Guards/        # Implementações de autenticação
│   │   ├── JwtGuard.php
│   │   └── SessionGuard.php
│   └── Providers/     # Provedores de autenticação
│       └── DatabaseUserProvider.php
├── tests/            # Testes unitários
├── composer.json     # Dependências
└── README.md         # Este arquivo
```

## Dependências

- lady-php/support: ^1.0
- lady-php/database: ^1.0
- firebase/php-jwt: ^6.0

## Funcionalidades

1. **Autenticação JWT**
   - Geração de tokens
   - Validação de tokens
   - Refresh tokens

2. **Autenticação por Sessão**
   - Login/Logout
   - Remember me
   - Proteção CSRF

3. **Provedores de Usuário**
   - Database
   - Custom providers

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

1. **Namespaces**: `LadyPHP\Auth`
2. **Testes**: Cobertura mínima de 80%
3. **Documentação**: PHPDoc em todas as classes

## Integração

Para usar este módulo em seu projeto:

```php
use LadyPHP\Auth\AuthManager;

$auth = new AuthManager();
$auth->attempt(['email' => 'user@example.com', 'password' => 'secret']);
```

## Licença

MIT License 