# Módulo Security

## Visão Geral
O módulo Security do LadyPHP Framework fornece funcionalidades essenciais de segurança, incluindo criptografia, hash de senhas e proteção CSRF.

## Componentes

### Encryption
- Criptografia de dados
- Gerenciamento de chaves
- Helpers de criptografia

### Hashing
- Hash de senhas seguro
- Verificação de hash
- Helpers de hash

### CSRF
- Proteção contra CSRF
- Geração de tokens
- Validação de tokens

## Dependências
- PHP 8.1+
- OpenSSL
- PSR-4 (Autoloading)

## Instalação
```bash
composer require lady/framework-security
```

## Uso Básico
```php
use Lady\Security\Encryption\Encrypter;
use Lady\Security\Hashing\Hasher;
use Lady\Security\CSRF\CsrfToken;

// Criptografia
$encrypter = new Encrypter($key);
$encrypted = $encrypter->encrypt($value);
$decrypted = $encrypter->decrypt($encrypted);

// Hash
$hasher = new Hasher();
$hashed = $hasher->make($password);
$isValid = $hasher->check($password, $hashed);

// CSRF
$csrf = new CsrfToken();
$token = $csrf->generate();
$isValid = $csrf->validate($token);
```

## Documentação
Para documentação completa, consulte a [Documentação do Security](docs/security.md)

## Contribuição
1. Fork o repositório
2. Crie sua feature branch
3. Commit suas mudanças
4. Push para a branch
5. Crie um Pull Request

## Licença
MIT License 