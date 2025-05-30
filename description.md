# LadyPHP Framework Core

## Visão Geral

O LadyPHP Framework é um framework PHP moderno e modular, projetado para oferecer uma base sólida e flexível para desenvolvimento de aplicações web. Inspirado no Laravel, mas com uma abordagem mais modular e extensível.

## Estrutura do Framework

```
framework/
├── src/                    # Código fonte do framework
│   ├── Auth/              # Módulo de autenticação
│   │   ├── Contracts/     # Interfaces
│   │   ├── Guards/        # Implementações de autenticação
│   │   └── Providers/     # Provedores de autenticação
│   ├── Database/          # Módulo de banco de dados
│   │   ├── Connection/    # Gerenciamento de conexões
│   │   ├── Query/         # Construtor de queries
│   │   └── Schema/        # Migrações e schema
│   ├── Http/              # Módulo HTTP
│   │   ├── Controllers/   # Controladores base
│   │   ├── Middleware/    # Middlewares
│   │   └── Routing/       # Sistema de rotas
│   └── Support/           # Utilitários e helpers
├── config/                # Configurações padrão
├── bootstrap/            # Arquivos de inicialização
└── tests/                # Testes do framework
```

## Módulos Principais

### Auth
- Sistema de autenticação flexível
- Suporte a múltiplos guards
- Gerenciamento de tokens JWT
- Provedores de autenticação customizáveis

### Database
- Query Builder moderno
- Sistema de migrações
- Múltiplos drivers de banco de dados
- ORM simples e eficiente

### Http
- Sistema de rotas robusto
- Middleware pipeline
- Controladores base
- Resposta HTTP padronizada

### Support
- Helpers e utilitários
- Sistema de eventos
- Container de injeção de dependência
- Sistema de cache

## Características

1. **Modularidade**
   - Módulos independentes
   - Fácil extensão
   - Baixo acoplamento

2. **Performance**
   - Otimizado para PHP 8.1+
   - Cache inteligente
   - Lazy loading

3. **Segurança**
   - Proteção contra CSRF
   - Sanitização de inputs
   - Headers de segurança

4. **Extensibilidade**
   - Sistema de plugins
   - Hooks e eventos
   - Interfaces bem definidas

## Tecnologias

- PHP 8.1+
- Composer
- PHPUnit
- PHPStan
- PHP_CodeSniffer

## Desenvolvimento

Para contribuir com o framework:

1. Clone o repositório
2. Instale as dependências: `composer install`
3. Execute os testes: `composer test`
4. Verifique o código: `composer cs-check`
5. Faça commit seguindo as convenções

## Convenções

1. **Namespaces**: Seguem a estrutura de diretórios
2. **Nomenclatura**: 
   - Classes: PascalCase
   - Métodos: camelCase
   - Variáveis: camelCase
3. **Documentação**: PHPDoc em todas as classes e métodos
4. **Testes**: Cobertura mínima de 80%

## Licença

MIT License 