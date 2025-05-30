# Módulo HTTP

## Visão Geral
O módulo HTTP do LadyPHP Framework fornece funcionalidades para manipulação de requisições e respostas HTTP, roteamento, controladores e middleware.

## Componentes

### Routing
- Sistema de rotas
- Middleware de rotas
- Grupos de rotas
- Parâmetros de rota

### Controllers
- Controller base
- Respostas de controller
- Injeção de dependências
- Middleware de controller

### Middleware
- Pipeline de middleware
- Middleware base
- Middleware de segurança
- Middleware de autenticação

### Requests
- Form requests
- Validação de requests
- Sanitização de dados
- Upload de arquivos

### Responses
- Respostas HTTP
- Headers
- Cookies
- Redirecionamentos

## Dependências
- PHP 8.1+
- PSR-7 (HTTP Message Interface)
- PSR-15 (HTTP Server Middleware)
- PSR-17 (HTTP Factories)

## Instalação
```bash
composer require lady/framework-http
```

## Uso Básico
```php
use Lady\Http\Routing\Router;
use Lady\Http\Controllers\Controller;
use Lady\Http\Middleware\Middleware;

// Rotas
$router = new Router();
$router->get('/users', [UserController::class, 'index']);
$router->post('/users', [UserController::class, 'store']);

// Controller
class UserController extends Controller
{
    public function index()
    {
        return $this->response()->json(['users' => User::all()]);
    }
}

// Middleware
class AuthMiddleware extends Middleware
{
    public function handle($request, $next)
    {
        if (!$this->auth->check()) {
            return $this->redirect('login');
        }
        return $next($request);
    }
}
```

## Documentação
Para documentação completa, consulte a [Documentação do HTTP](docs/http.md)

## Contribuição
1. Fork o repositório
2. Crie sua feature branch
3. Commit suas mudanças
4. Push para a branch
5. Crie um Pull Request

## Licença
MIT License 