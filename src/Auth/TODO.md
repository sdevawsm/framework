# TODO - Módulo Auth

## Ordem de Implementação

### 1. Authentication
- [ ] Interface AuthInterface
  - [ ] Método attempt()
  - [ ] Método check()
  - [ ] Método user()
  - [ ] Método logout()

- [ ] Classe Auth
  - [ ] Implementação de AuthInterface
  - [ ] Sistema de guards
  - [ ] Sistema de providers
  - [ ] Remember me

### 2. Authorization
- [ ] Interface GateInterface
  - [ ] Método define()
  - [ ] Método allows()
  - [ ] Método denies()

- [ ] Classe Gate
  - [ ] Implementação de GateInterface
  - [ ] Sistema de policies
  - [ ] Sistema de permissões
  - [ ] Sistema de papéis

### 3. Guards
- [ ] Interface GuardInterface
  - [ ] Método validate()
  - [ ] Método user()
  - [ ] Método id()

- [ ] Guards Padrão
  - [ ] SessionGuard
  - [ ] TokenGuard
  - [ ] JwtGuard

### 4. Providers
- [ ] Interface ProviderInterface
  - [ ] Método retrieveById()
  - [ ] Método retrieveByCredentials()
  - [ ] Método validateCredentials()

- [ ] Providers Padrão
  - [ ] DatabaseProvider
  - [ ] LdapProvider
  - [ ] OAuthProvider

## Testes

### Authentication
- [ ] Testes de autenticação
- [ ] Testes de guards
- [ ] Testes de providers
- [ ] Testes de remember me

### Authorization
- [ ] Testes de gates
- [ ] Testes de policies
- [ ] Testes de permissões
- [ ] Testes de papéis

### Guards
- [ ] Testes de SessionGuard
- [ ] Testes de TokenGuard
- [ ] Testes de JwtGuard
- [ ] Testes de custom guards

### Providers
- [ ] Testes de DatabaseProvider
- [ ] Testes de LdapProvider
- [ ] Testes de OAuthProvider
- [ ] Testes de custom providers

## Documentação

### Authentication
- [ ] Documentação de interfaces
- [ ] Documentação de classes
- [ ] Exemplos de uso
- [ ] Guia de autenticação

### Authorization
- [ ] Documentação de gates
- [ ] Documentação de policies
- [ ] Exemplos de uso
- [ ] Guia de autorização

### Guards
- [ ] Documentação de guards
- [ ] Documentação de configuração
- [ ] Exemplos de uso
- [ ] Guia de guards

### Providers
- [ ] Documentação de providers
- [ ] Documentação de configuração
- [ ] Exemplos de uso
- [ ] Guia de providers

## Qualidade

### Análise Estática
- [ ] Configuração do PHPStan
- [ ] Configuração do PHP_CodeSniffer
- [ ] Análise de código

### Cobertura de Testes
- [ ] Configuração do PHPUnit
- [ ] Cobertura mínima de 80%
- [ ] Relatórios de cobertura

## Progresso

- [ ] Authentication
- [ ] Authorization
- [ ] Guards
- [ ] Providers 