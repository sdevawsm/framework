# Módulo Auth

## Visão Geral
O módulo Auth do LadyPHP Framework fornece um sistema completo de autenticação e autorização, incluindo suporte a múltiplos guards, providers, autenticação via tokens JWT, e gerenciamento de permissões e papéis.

## Componentes

### Authentication
- Sistema de autenticação
- Múltiplos guards
- Providers customizáveis
- Remember me
- Autenticação via JWT

### Authorization
- Sistema de autorização
- Gates e Policies
- Permissões
- Papéis (Roles)
- ACL

### Guards
- Session Guard
- Token Guard
- JWT Guard
- Custom Guards

### Providers
- Database Provider
- LDAP Provider
- OAuth Provider
- Custom Providers

## Dependências
- PHP 8.1+
- PSR-3 (Logger Interface)
- PSR-4 (Autoloading)
- JWT (JSON Web Tokens)

## Instalação
```bash
composer require lady/framework-auth
```

## Uso Básico
```php
use Lady\Auth\Auth;
use Lady\Auth\Guards\JwtGuard;
use Lady\Auth\Providers\DatabaseProvider;

// Configuração
$auth = new Auth();
$auth->setGuard('api', new JwtGuard(new DatabaseProvider()));

// Autenticação
$token = $auth->attempt([
    'email' => 'user@example.com',
    'password' => 'secret'
]);

// Verificação
if ($auth->check()) {
    $user = $auth->user();
}

// Autorização
if ($auth->can('edit-post', $post)) {
    // Usuário pode editar o post
}

// JWT
$token = $auth->guard('api')->generateToken($user);
$user = $auth->guard('api')->validateToken($token);
```

## Documentação
Para documentação completa, consulte a [Documentação do Auth](docs/auth.md)

## Contribuição
1. Fork o repositório
2. Crie sua feature branch
3. Commit suas mudanças
4. Push para a branch
5. Crie um Pull Request

## Licença
MIT License 