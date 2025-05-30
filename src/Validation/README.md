# Módulo Validation

## Visão Geral
O módulo Validation do LadyPHP Framework fornece um sistema robusto e flexível para validação de dados, incluindo regras personalizadas, mensagens de erro customizáveis e integração com o sistema de tradução.

## Componentes

### Validator
- Sistema de validação
- Regras de validação
- Mensagens de erro
- Tradução de mensagens

### Rules
- Regras padrão
- Regras personalizadas
- Regras condicionais
- Regras de validação de arquivos

### Messages
- Mensagens padrão
- Mensagens customizadas
- Suporte a múltiplos idiomas
- Formatação de mensagens

### Extensions
- Extensões de validação
- Regras customizadas
- Integração com outros módulos
- Hooks de validação

## Dependências
- PHP 8.1+
- PSR-3 (Logger Interface)
- PSR-4 (Autoloading)
- PSR-7 (HTTP Message Interface)

## Instalação
```bash
composer require lady/framework-validation
```

## Uso Básico
```php
use Lady\Validation\Validator;
use Lady\Validation\Rules\Required;
use Lady\Validation\Rules\Email;

// Validação básica
$validator = new Validator();
$validator->validate([
    'email' => ['required', 'email'],
    'name' => ['required', 'min:3']
], [
    'email' => 'user@example.com',
    'name' => 'John'
]);

// Regras personalizadas
$validator->addRule('custom_rule', function($value) {
    return $value === 'expected';
});

// Mensagens customizadas
$validator->setMessages([
    'email.required' => 'O email é obrigatório',
    'name.min' => 'O nome deve ter pelo menos 3 caracteres'
]);
```

## Documentação
Para documentação completa, consulte a [Documentação do Validation](docs/validation.md)

## Contribuição
1. Fork o repositório
2. Crie sua feature branch
3. Commit suas mudanças
4. Push para a branch
5. Crie um Pull Request

## Licença
MIT License 