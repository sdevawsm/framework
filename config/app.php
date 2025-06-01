<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Nome da Aplicação
    |--------------------------------------------------------------------------
    |
    | Este valor é o nome da sua aplicação. Este valor é usado quando o framework
    | precisa colocar o nome da aplicação em uma notificação ou em qualquer outro
    | lugar onde o nome da aplicação precise ser exibido.
    |
    */

    'name' => env('APP_NAME', 'LadyPHP Framework'),

    /*
    |--------------------------------------------------------------------------
    | Ambiente da Aplicação
    |--------------------------------------------------------------------------
    |
    | Este valor determina o "ambiente" da sua aplicação. Isso pode determinar
    | como você prefere configurar vários serviços da aplicação.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Modo de Depuração
    |--------------------------------------------------------------------------
    |
    | Quando sua aplicação está em modo de depuração, mensagens de erro detalhadas
    | com stack traces serão mostradas em cada erro que ocorre. Se desativado, uma
    | página de erro genérica simples será mostrada.
    |
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL da Aplicação
    |--------------------------------------------------------------------------
    |
    | Esta URL é usada pelo console para gerar URLs corretamente quando usando
    | o comando Artisan. Você deve definir isso para a raiz da sua aplicação.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Fuso Horário da Aplicação
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar o fuso horário padrão para sua aplicação.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Configuração de Localização
    |--------------------------------------------------------------------------
    |
    | A localização padrão da aplicação. Esta localização será usada pelo
    | framework quando precisar traduzir strings.
    |
    */

    'locale' => 'pt_BR',

    /*
    |--------------------------------------------------------------------------
    | Localização de Fallback
    |--------------------------------------------------------------------------
    |
    | Esta localização será usada quando a localização atual não estiver
    | disponível.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Chave de Criptografia
    |--------------------------------------------------------------------------
    |
    | Esta chave é usada pelo serviço de criptografia e deve ser definida
    | para uma string aleatória de 32 caracteres.
    |
    */

    'key' => env('APP_KEY', 'base64:your-secret-key-here'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Provedores de Serviço
    |--------------------------------------------------------------------------
    |
    | Os provedores de serviço listados abaixo serão carregados automaticamente
    | pelo framework.
    |
    */

    'providers' => [
        // Provedores do Framework
        \Lady\Core\ServiceProvider\ConfigServiceProvider::class,
        \Lady\Core\ServiceProvider\EnvironmentServiceProvider::class,
        \Lady\Core\ServiceProvider\EventServiceProvider::class,
        \Lady\Core\ServiceProvider\RouteServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Aliases de Classe
    |--------------------------------------------------------------------------
    |
    | Esta array de aliases será registrado quando a aplicação iniciar.
    |
    */

    'aliases' => [
        'App' => \Lady\Core\Application\Application::class,
        'Config' => \Lady\Core\Config\Config::class,
        'Event' => \Lady\Core\Events\Event::class,
        'Route' => \Lady\Core\Routing\Route::class,
    ],
]; 