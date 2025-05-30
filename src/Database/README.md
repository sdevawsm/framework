# LadyPHP Database Module

## Visão Geral

Módulo de banco de dados do LadyPHP Framework, responsável por gerenciar conexões, queries e migrações.

## Estrutura

```
Database/
├── src/
│   ├── Connection/    # Gerenciamento de conexões
│   │   ├── Connection.php
│   │   └── ConnectionManager.php
│   ├── Query/        # Construtor de queries
│   │   ├── Builder.php
│   │   └── Grammar.php
│   └── Schema/       # Migrações e schema
│       ├── Blueprint.php
│       └── Schema.php
├── tests/           # Testes unitários
├── composer.json    # Dependências
└── README.md        # Este arquivo
```

## Dependências

- lady-php/support: ^1.0
- doctrine/dbal: ^3.0

## Funcionalidades

1. **Gerenciamento de Conexões**
   - Múltiplos drivers (MySQL, PostgreSQL, SQLite)
   - Pool de conexões
   - Configuração flexível

2. **Query Builder**
   - Construção de queries
   - Prepared statements
   - Transações

3. **Schema Builder**
   - Migrações
   - Seeds
   - Alterações de schema

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

1. **Namespaces**: `LadyPHP\Database`
2. **Testes**: Cobertura mínima de 80%
3. **Documentação**: PHPDoc em todas as classes

## Integração

Para usar este módulo em seu projeto:

```php
use LadyPHP\Database\ConnectionManager;

$db = new ConnectionManager();
$users = $db->table('users')->where('active', true)->get();
```

## Licença

MIT License 