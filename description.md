# LadyPHP Framework Core

## Visão Geral

O LadyPHP Framework é um framework PHP moderno e modular, projetado para oferecer uma base sólida e flexível para desenvolvimento de aplicações web. Inspirado no Laravel, mas com uma abordagem mais modular e extensível.

## Estrutura do Framework

```
framework/
├── src/                    # Código fonte do framework
│   ├── Core/              # Núcleo do framework
│   │   ├── Application/   # Classe principal da aplicação
│   │   ├── Container/     # Container de DI
│   │   ├── Config/        # Gerenciamento de configurações
│   │   └── Environment/   # Gerenciamento de variáveis de ambiente
│   │
│   ├── Foundation/        # Fundação do framework
│   │   ├── Contracts/     # Interfaces principais
│   │   ├── Exceptions/    # Exceções personalizadas
│   │   ├── ServiceProvider/ # Provedores de serviço
│   │   └── Support/       # Helpers e utilitários
│   │
│   ├── Http/             # Camada HTTP
│   │   ├── Controllers/  # Controladores base
│   │   ├── Middleware/   # Middlewares
│   │   ├── Requests/     # Form Requests
│   │   ├── Responses/    # Respostas HTTP
│   │   └── Routing/      # Sistema de rotas
│   │
│   ├── Auth/             # Autenticação
│   │   ├── Guards/       # Guards de autenticação
│   │   ├── JWT/          # Implementação JWT
│   │   └── Providers/    # Provedores de autenticação
│   │
│   ├── Database/         # Camada de dados
│   │   ├── Connection/   # Conexões com banco
│   │   ├── Query/        # Query Builder
│   │   ├── Schema/       # Migrações
│   │   └── ORM/          # ORM básico
│   │
│   ├── Cache/            # Sistema de cache
│   │   ├── Drivers/      # Drivers de cache
│   │   └── Store/        # Implementações de store
│   │
│   ├── Events/           # Sistema de eventos
│   │   ├── Dispatcher/   # Dispatcher de eventos
│   │   └── Listeners/    # Listeners base
│   │
│   ├── Logging/          # Sistema de logs
│   │   ├── Channels/     # Canais de log
│   │   └── Handlers/     # Handlers de log
│   │
│   ├── Validation/       # Validação
│   │   ├── Rules/        # Regras de validação
│   │   └── Validator/    # Validador
│   │
│   └── Security/         # Segurança
│       ├── Encryption/   # Criptografia
│       ├── Hashing/      # Hash de senhas
│       └── CSRF/         # Proteção CSRF
│
├── config/               # Configurações
├── bootstrap/           # Arquivos de inicialização
└── tests/               # Testes do framework
```

## Módulos Principais

### Core
- Classe principal da aplicação
- Container de injeção de dependência
- Gerenciamento de configurações
- Ambiente e variáveis de ambiente

### Foundation
- Interfaces principais do framework
- Sistema de exceções
- Provedores de serviço
- Helpers e utilitários

### Http
- Sistema de rotas robusto
- Middleware pipeline
- Controladores base
- Form Requests
- Respostas HTTP padronizadas

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

### Cache
- Sistema de cache flexível
- Múltiplos drivers de cache
- Cache tags e versionamento

### Events
- Sistema de eventos assíncrono
- Dispatcher de eventos
- Listeners e subscribers

### Logging
- Sistema de logs configurável
- Múltiplos canais de log
- Rotação de logs
- Formatação personalizada

### Validation
- Validação de dados
- Regras customizáveis
- Mensagens de erro personalizáveis

### Security
- Criptografia de dados
- Hash de senhas seguro
- Proteção CSRF
- Headers de segurança

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