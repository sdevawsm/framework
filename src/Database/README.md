# Módulo Database

## Visão Geral
O módulo Database do LadyPHP Framework fornece uma camada de abstração robusta para interação com bancos de dados, suportando múltiplos drivers, migrations, seeds, e um ORM completo com suporte a relacionamentos, queries builder e transações.

## Componentes

### Connection
- Gerenciamento de conexões
- Múltiplos drivers
- Pool de conexões
- Configuração flexível

### Query Builder
- Query builder fluente
- Suporte a joins
- Subqueries
- Raw queries

### ORM
- Modelos Eloquent
- Relacionamentos
- Eager loading
- Scopes
- Mutators/Accessors

### Migrations
- Sistema de migrations
- Rollback
- Seeds
- Schema builder

## Dependências
- PHP 8.1+
- PDO
- PSR-3 (Logger Interface)
- PSR-4 (Autoloading)

## Instalação
```bash
composer require lady/framework-database
```

## Uso Básico
```php
use Lady\Database\Connection;
use Lady\Database\Query\Builder;
use Lady\Database\ORM\Model;

// Conexão
$connection = new Connection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'app',
    'username' => 'root',
    'password' => 'secret'
]);

// Query Builder
$users = $connection->table('users')
    ->select('name', 'email')
    ->where('active', true)
    ->orderBy('name')
    ->get();

// ORM
class User extends Model
{
    protected $fillable = ['name', 'email'];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

$user = User::with('posts')->find(1);
```

## Documentação
Para documentação completa, consulte a [Documentação do Database](docs/database.md)

## Contribuição
1. Fork o repositório
2. Crie sua feature branch
3. Commit suas mudanças
4. Push para a branch
5. Crie um Pull Request

## Licença
MIT License 