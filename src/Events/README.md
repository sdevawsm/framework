# Módulo Events

## Visão Geral
O módulo Events do LadyPHP Framework fornece um sistema robusto de eventos e listeners, permitindo a implementação do padrão Observer e facilitando a comunicação desacoplada entre diferentes partes da aplicação.

## Componentes

### EventDispatcher
- Sistema de eventos
- Registro de listeners
- Priorização de listeners
- Eventos assíncronos

### Events
- Eventos base
- Eventos customizados
- Eventos de domínio
- Eventos de sistema

### Listeners
- Listeners base
- Listeners assíncronos
- Priorização
- Cancelamento de propagação

### Subscribers
- Sistema de subscribers
- Registro automático
- Priorização
- Filtros de eventos

## Dependências
- PHP 8.1+
- PSR-3 (Logger Interface)
- PSR-4 (Autoloading)
- PSR-14 (Event Dispatcher)

## Instalação
```bash
composer require lady/framework-events
```

## Uso Básico
```php
use Lady\Events\EventDispatcher;
use Lady\Events\Event;
use Lady\Events\Listener;

// Criando um evento
class UserRegistered extends Event
{
    public function __construct(public User $user)
    {
    }
}

// Criando um listener
class SendWelcomeEmail extends Listener
{
    public function handle(UserRegistered $event): void
    {
        // Enviar email de boas-vindas
    }
}

// Registrando e disparando eventos
$dispatcher = new EventDispatcher();
$dispatcher->addListener(UserRegistered::class, [SendWelcomeEmail::class, 'handle']);

$dispatcher->dispatch(new UserRegistered($user));
```

## Documentação
Para documentação completa, consulte a [Documentação do Events](docs/events.md)

## Contribuição
1. Fork o repositório
2. Crie sua feature branch
3. Commit suas mudanças
4. Push para a branch
5. Crie um Pull Request

## Licença
MIT License 