<?php return array (
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/var/www/html/resources/views',
    ),
    'compiled' => '/var/www/html/storage/framework/views',
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => '12',
      'verify' => true,
      'limit' => NULL,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
      'verify' => true,
    ),
    'rehash_on_login' => true,
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'reverb' => 
      array (
        'driver' => 'reverb',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'host' => NULL,
          'port' => 443,
          'scheme' => 'https',
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'cluster' => NULL,
          'host' => 'api-mt1.pusher.com',
          'port' => 443,
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'concurrency' => 
  array (
    'default' => 'process',
  ),
  'app' => 
  array (
    'name' => 'Laravel',
    'env' => 'local',
    'debug' => true,
    'url' => 'https://qaabil.ddev.site',
    'frontend_url' => 'http://localhost:3000',
    'asset_url' => NULL,
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'cipher' => 'AES-256-CBC',
    'key' => 'base64:W4YILvzu9MGbQcE4oGwt2xCxZLSsoL57Y9N7Q3m+5S4=',
    'previous_keys' => 
    array (
    ),
    'maintenance' => 
    array (
      'driver' => 'file',
      'store' => 'database',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Concurrency\\ConcurrencyServiceProvider',
      6 => 'Illuminate\\Cookie\\CookieServiceProvider',
      7 => 'Illuminate\\Database\\DatabaseServiceProvider',
      8 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      9 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      10 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      11 => 'Illuminate\\Hashing\\HashServiceProvider',
      12 => 'Illuminate\\Mail\\MailServiceProvider',
      13 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      14 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      15 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      16 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      17 => 'Illuminate\\Queue\\QueueServiceProvider',
      18 => 'Illuminate\\Redis\\RedisServiceProvider',
      19 => 'Illuminate\\Session\\SessionServiceProvider',
      20 => 'Illuminate\\Translation\\TranslationServiceProvider',
      21 => 'Illuminate\\Validation\\ValidationServiceProvider',
      22 => 'Illuminate\\View\\ViewServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'App\\Providers\\Filament\\AdminPanelProvider',
      25 => 'App\\Providers\\Filament\\ModeratorPanelProvider',
      26 => 'App\\Providers\\Filament\\StudentPanelProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Benchmark' => 'Illuminate\\Support\\Benchmark',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Concurrency' => 'Illuminate\\Support\\Facades\\Concurrency',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Context' => 'Illuminate\\Support\\Facades\\Context',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schedule' => 'Illuminate\\Support\\Facades\\Schedule',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'Uri' => 'Illuminate\\Support\\Uri',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
    ),
    'languages' => 
    array (
      'ab' => 'Abkhazian',
      'aa' => 'Afar',
      'af' => 'Afrikaans',
      'ak' => 'Akan',
      'sq' => 'Albanian',
      'am' => 'Amharic',
      'ar' => 'Arabic',
      'an' => 'Aragonese',
      'hy' => 'Armenian',
      'as' => 'Assamese',
      'av' => 'Avaric',
      'ae' => 'Avestan',
      'ay' => 'Aymara',
      'az' => 'Azerbaijani',
      'bm' => 'Bambara',
      'ba' => 'Bashkir',
      'eu' => 'Basque',
      'be' => 'Belarusian',
      'bn' => 'Bengali',
      'bh' => 'Bihari languages',
      'bi' => 'Bislama',
      'bs' => 'Bosnian',
      'br' => 'Breton',
      'bg' => 'Bulgarian',
      'my' => 'Burmese',
      'ca' => 'Catalan, Valencian',
      'km' => 'Central Khmer',
      'ch' => 'Chamorro',
      'ce' => 'Chechen',
      'ny' => 'Chichewa, Chewa, Nyanja',
      'zh' => 'Chinese',
      'cu' => 'Church Slavonic, Old Bulgarian, Old Church Slavonic',
      'cv' => 'Chuvash',
      'kw' => 'Cornish',
      'co' => 'Corsican',
      'cr' => 'Cree',
      'hr' => 'Croatian',
      'cs' => 'Czech',
      'da' => 'Danish',
      'dv' => 'Divehi, Dhivehi, Maldivian',
      'nl' => 'Dutch, Flemish',
      'dz' => 'Dzongkha',
      'en' => 'English',
      'eo' => 'Esperanto',
      'et' => 'Estonian',
      'ee' => 'Ewe',
      'fo' => 'Faroese',
      'fj' => 'Fijian',
      'fi' => 'Finnish',
      'fr' => 'French',
      'ff' => 'Fulah',
      'gd' => 'Gaelic, Scottish Gaelic',
      'gl' => 'Galician',
      'lg' => 'Ganda',
      'ka' => 'Georgian',
      'de' => 'German',
      'ki' => 'Gikuyu, Kikuyu',
      'el' => 'Greek (Modern)',
      'kl' => 'Greenlandic, Kalaallisut',
      'gn' => 'Guarani',
      'gu' => 'Gujarati',
      'ht' => 'Haitian, Haitian Creole',
      'ha' => 'Hausa',
      'he' => 'Hebrew',
      'hz' => 'Herero',
      'hi' => 'Hindi',
      'ho' => 'Hiri Motu',
      'hu' => 'Hungarian',
      'is' => 'Icelandic',
      'io' => 'Ido',
      'ig' => 'Igbo',
      'id' => 'Indonesian',
      'ia' => 'Interlingua (International Auxiliary Language Association)',
      'ie' => 'Interlingue',
      'iu' => 'Inuktitut',
      'ik' => 'Inupiaq',
      'ga' => 'Irish',
      'it' => 'Italian',
      'ja' => 'Japanese',
      'jv' => 'Javanese',
      'kn' => 'Kannada',
      'kr' => 'Kanuri',
      'ks' => 'Kashmiri',
      'kk' => 'Kazakh',
      'rw' => 'Kinyarwanda',
      'kv' => 'Komi',
      'kg' => 'Kongo',
      'ko' => 'Korean',
      'kj' => 'Kwanyama, Kuanyama',
      'ku' => 'Kurdish',
      'ky' => 'Kyrgyz',
      'lo' => 'Lao',
      'la' => 'Latin',
      'lv' => 'Latvian',
      'lb' => 'Letzeburgesch, Luxembourgish',
      'li' => 'Limburgish, Limburgan, Limburger',
      'ln' => 'Lingala',
      'lt' => 'Lithuanian',
      'lu' => 'Luba-Katanga',
      'mk' => 'Macedonian',
      'mg' => 'Malagasy',
      'ms' => 'Malay',
      'ml' => 'Malayalam',
      'mt' => 'Maltese',
      'gv' => 'Manx',
      'mi' => 'Maori',
      'mr' => 'Marathi',
      'mh' => 'Marshallese',
      'ro' => 'Moldovan, Moldavian, Romanian',
      'mn' => 'Mongolian',
      'na' => 'Nauru',
      'nv' => 'Navajo, Navaho',
      'nd' => 'Northern Ndebele',
      'ng' => 'Ndonga',
      'ne' => 'Nepali',
      'se' => 'Northern Sami',
      'no' => 'Norwegian',
      'nb' => 'Norwegian Bokmål',
      'nn' => 'Norwegian Nynorsk',
      'ii' => 'Nuosu, Sichuan Yi',
      'oc' => 'Occitan (post 1500)',
      'oj' => 'Ojibwa',
      'or' => 'Oriya',
      'om' => 'Oromo',
      'os' => 'Ossetian, Ossetic',
      'pi' => 'Pali',
      'pa' => 'Panjabi, Punjabi',
      'ps' => 'Pashto, Pushto',
      'fa' => 'Persian',
      'pl' => 'Polish',
      'pt' => 'Portuguese',
      'qu' => 'Quechua',
      'rm' => 'Romansh',
      'rn' => 'Rundi',
      'ru' => 'Russian',
      'sm' => 'Samoan',
      'sg' => 'Sango',
      'sa' => 'Sanskrit',
      'sc' => 'Sardinian',
      'sr' => 'Serbian',
      'sn' => 'Shona',
      'sd' => 'Sindhi',
      'si' => 'Sinhala, Sinhalese',
      'sk' => 'Slovak',
      'sl' => 'Slovenian',
      'so' => 'Somali',
      'st' => 'Sotho, Southern',
      'nr' => 'South Ndebele',
      'es' => 'Spanish, Castilian',
      'su' => 'Sundanese',
      'sw' => 'Swahili',
      'ss' => 'Swati',
      'sv' => 'Swedish',
      'tl' => 'Tagalog',
      'ty' => 'Tahitian',
      'tg' => 'Tajik',
      'ta' => 'Tamil',
      'tt' => 'Tatar',
      'te' => 'Telugu',
      'th' => 'Thai',
      'bo' => 'Tibetan',
      'ti' => 'Tigrinya',
      'to' => 'Tonga (Tonga Islands)',
      'ts' => 'Tsonga',
      'tn' => 'Tswana',
      'tr' => 'Turkish',
      'tk' => 'Turkmen',
      'tw' => 'Twi',
      'ug' => 'Uighur, Uyghur',
      'uk' => 'Ukrainian',
      'ur' => 'Urdu',
      'uz' => 'Uzbek',
      've' => 'Venda',
      'vi' => 'Vietnamese',
      'vo' => 'Volap_k',
      'wa' => 'Walloon',
      'cy' => 'Welsh',
      'fy' => 'Western Frisian',
      'wo' => 'Wolof',
      'xh' => 'Xhosa',
      'yi' => 'Yiddish',
      'yo' => 'Yoruba',
      'za' => 'Zhuang, Chuang',
      'zu' => 'Zulu',
    ),
    'admin_email' => NULL,
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'cache' => 
  array (
    'default' => 'database',
    'stores' => 
    array (
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'session' => 
      array (
        'driver' => 'session',
        'key' => '_cache',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'cache',
        'lock_connection' => NULL,
        'lock_table' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/var/www/html/storage/framework/cache/data',
        'lock_path' => '/var/www/html/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
      'failover' => 
      array (
        'driver' => 'failover',
        'stores' => 
        array (
          0 => 'database',
          1 => 'array',
        ),
      ),
    ),
    'prefix' => 'laravel-cache-',
  ),
  'database' => 
  array (
    'default' => 'mariadb',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'db',
        'prefix' => '',
        'foreign_key_constraints' => true,
        'busy_timeout' => NULL,
        'journal_mode' => NULL,
        'synchronous' => NULL,
        'transaction_mode' => 'DEFERRED',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => 'db',
        'port' => '3306',
        'database' => 'db',
        'username' => 'db',
        'password' => 'db',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'mariadb' => 
      array (
        'driver' => 'mariadb',
        'url' => NULL,
        'host' => 'db',
        'port' => '3306',
        'database' => 'db',
        'username' => 'db',
        'password' => 'db',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => 'db',
        'port' => '3306',
        'database' => 'db',
        'username' => 'db',
        'password' => 'db',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => 'db',
        'port' => '3306',
        'database' => 'db',
        'username' => 'db',
        'password' => 'db',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 
    array (
      'table' => 'migrations',
      'update_date_on_publish' => true,
    ),
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'laravel-database-',
        'persistent' => false,
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
        'max_retries' => 3,
        'backoff_algorithm' => 'decorrelated_jitter',
        'backoff_base' => 100,
        'backoff_cap' => 1000,
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
        'max_retries' => 3,
        'backoff_algorithm' => 'decorrelated_jitter',
        'backoff_base' => 100,
        'backoff_cap' => 1000,
      ),
    ),
  ),
  'debugbar' => 
  array (
    'enabled' => NULL,
    'collect_jobs' => false,
    'except' => 
    array (
      0 => 'telescope*',
      1 => 'horizon*',
      2 => '_boost/browser-logs',
    ),
    'collectors' => 
    array (
      'phpinfo' => false,
      'messages' => true,
      'time' => true,
      'memory' => true,
      'exceptions' => true,
      'log' => true,
      'db' => true,
      'views' => true,
      'route' => false,
      'auth' => false,
      'gate' => true,
      'session' => false,
      'symfony_request' => true,
      'mail' => true,
      'laravel' => true,
      'events' => false,
      'logs' => false,
      'config' => false,
      'cache' => true,
      'models' => true,
      'livewire' => true,
      'inertia' => true,
      'jobs' => true,
      'pennant' => true,
      'http_client' => true,
    ),
    'options' => 
    array (
      'time' => 
      array (
        'memory_usage' => false,
      ),
      'messages' => 
      array (
        'trace' => true,
        'backtrace_exclude_paths' => 
        array (
        ),
        'capture_dumps' => false,
        'timeline' => true,
      ),
      'memory' => 
      array (
        'reset_peak' => false,
        'with_baseline' => false,
        'precision' => 0,
      ),
      'auth' => 
      array (
        'show_name' => true,
        'show_guards' => true,
      ),
      'gate' => 
      array (
        'trace' => false,
        'timeline' => false,
      ),
      'db' => 
      array (
        'with_params' => true,
        'exclude_paths' => 
        array (
        ),
        'backtrace' => true,
        'backtrace_exclude_paths' => 
        array (
        ),
        'timeline' => false,
        'duration_background' => true,
        'explain' => true,
        'only_slow_queries' => true,
        'slow_threshold' => false,
        'memory_usage' => false,
        'soft_limit' => 100,
        'hard_limit' => 500,
      ),
      'mail' => 
      array (
        'timeline' => true,
        'show_body' => true,
      ),
      'views' => 
      array (
        'timeline' => true,
        'data' => false,
        'group' => 50,
        'exclude_paths' => 
        array (
          0 => 'vendor/filament',
        ),
      ),
      'inertia' => 
      array (
        'pages' => 'js/Pages',
      ),
      'route' => 
      array (
        'label' => true,
      ),
      'session' => 
      array (
        'masked' => 
        array (
        ),
      ),
      'symfony_request' => 
      array (
        'label' => true,
        'masked' => 
        array (
        ),
      ),
      'events' => 
      array (
        'data' => false,
        'listeners' => false,
        'excluded' => 
        array (
        ),
      ),
      'logs' => 
      array (
        'file' => NULL,
      ),
      'cache' => 
      array (
        'values' => true,
        'timeline' => false,
      ),
      'http_client' => 
      array (
        'masked' => 
        array (
        ),
        'timeline' => true,
      ),
    ),
    'custom_collectors' => 
    array (
    ),
    'editor' => 'phpstorm',
    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'ajax_handler_auto_show' => true,
    'ajax_handler_enable_tab' => true,
    'capture_streamed' => false,
    'streamed_content_types' => 
    array (
      0 => 'text/event-stream',
    ),
    'defer_datasets' => false,
    'remote_sites_path' => NULL,
    'local_sites_path' => NULL,
    'storage' => 
    array (
      'enabled' => true,
      'open' => NULL,
      'driver' => 'file',
      'path' => '/var/www/html/storage/debugbar',
      'connection' => NULL,
      'provider' => '',
    ),
    'force_allow_enable' => false,
    'use_dist_files' => true,
    'include_vendors' => true,
    'error_handler' => false,
    'error_level' => 30719,
    'clockwork' => false,
    'inject' => true,
    'route_prefix' => '_debugbar',
    'route_middleware' => 
    array (
    ),
    'route_domain' => NULL,
    'theme' => 'auto',
    'debug_backtrace_limit' => 50,
  ),
  'filament' => 
  array (
    'broadcasting' => 
    array (
    ),
    'default_filesystem_disk' => 'local',
    'temporary_file_url_expiry_minutes' => 30,
    'assets_path' => NULL,
    'cache_path' => '/var/www/html/bootstrap/cache/filament',
    'livewire_loading_delay' => 'default',
    'file_generation' => 
    array (
      'flags' => 
      array (
      ),
    ),
    'system_route_prefix' => 'filament',
    'loading_indicator_svg' => '<svg __attributes__
        xmlns=\'http://www.w3.org/2000/svg\' width=\'24\' height=\'24\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\' class=\'lucide lucide-loader-icon lucide-loader\'><path d=\'M12 2v4\'/><path d=\'m16.2 7.8 2.9-2.9\'/><path d=\'M18 12h4\'/><path d=\'m16.2 16.2 2.9 2.9\'/><path d=\'M12 18v4\'/><path d=\'m4.9 19.1 2.9-2.9\'/><path d=\'M2 12h4\'/><path d=\'m4.9 4.9 2.9 2.9\'/></svg>',
  ),
  'filament-edit-profile' => 
  array (
    'name_column' => 'name',
    'locale_column' => 'locale',
    'theme_color_column' => 'theme_color',
    'avatar_column' => 'avatar_url',
    'disk' => 'local',
    'visibility' => 'public',
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/storage/app/private',
        'serve' => true,
        'throw' => false,
        'report' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/storage/app/public',
        'url' => 'https://qaabil.ddev.site/storage',
        'visibility' => 'public',
        'throw' => false,
        'report' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
        'report' => false,
      ),
      'bunny_stream' => 
      array (
        'driver' => 'bunny_stream',
        'hostname' => NULL,
        'library_id' => NULL,
        'api_key' => NULL,
      ),
    ),
    'links' => 
    array (
      '/var/www/html/public/storage' => '/var/www/html/storage/app/public',
    ),
  ),
  'gamify' => 
  array (
    'payee_model' => 'App\\Models\\User',
    'reputation_model' => '\\QCod\\Gamify\\Reputation',
    'allow_reputation_duplicate' => true,
    'broadcast_on_private_channel' => true,
    'channel_name' => 'user.reputation.',
    'badge_model' => '\\QCod\\Gamify\\Badge',
    'badge_icon_folder' => 'images/badges/',
    'badge_icon_extension' => '.svg',
    'badge_levels' => 
    array (
      'beginner' => 1,
      'intermediate' => 2,
      'advanced' => 3,
    ),
    'badge_default_level' => 1,
  ),
  'livewire' => 
  array (
    'component_locations' => 
    array (
      0 => '/var/www/html/resources/views/components',
      1 => '/var/www/html/resources/views/livewire',
    ),
    'component_namespaces' => 
    array (
      'layouts' => '/var/www/html/resources/views/layouts',
      'pages' => '/var/www/html/resources/views/pages',
    ),
    'component_layout' => 'layouts::app',
    'component_placeholder' => NULL,
    'make_command' => 
    array (
      'type' => 'sfc',
      'emoji' => true,
      'with' => 
      array (
        'js' => false,
        'css' => false,
        'test' => false,
      ),
    ),
    'class_namespace' => 'App\\Livewire',
    'class_path' => '/var/www/html/app/Livewire',
    'view_path' => '/var/www/html/resources/views/livewire',
    'temporary_file_upload' => 
    array (
      'disk' => NULL,
      'rules' => NULL,
      'directory' => NULL,
      'middleware' => NULL,
      'preview_mimes' => 
      array (
        0 => 'png',
        1 => 'gif',
        2 => 'bmp',
        3 => 'svg',
        4 => 'wav',
        5 => 'mp4',
        6 => 'mov',
        7 => 'avi',
        8 => 'wmv',
        9 => 'mp3',
        10 => 'm4a',
        11 => 'jpg',
        12 => 'jpeg',
        13 => 'mpga',
        14 => 'webp',
        15 => 'wma',
      ),
      'max_upload_time' => 5,
      'cleanup' => true,
    ),
    'render_on_redirect' => false,
    'legacy_model_binding' => false,
    'inject_assets' => true,
    'navigate' => 
    array (
      'show_progress_bar' => true,
      'progress_bar_color' => '#2299dd',
    ),
    'inject_morph_markers' => true,
    'smart_wire_keys' => true,
    'pagination_theme' => 'tailwind',
    'release_token' => 'a',
    'csp_safe' => false,
    'payload' => 
    array (
      'max_size' => 1048576,
      'max_nesting_depth' => 10,
      'max_calls' => 50,
      'max_components' => 200,
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/var/www/html/storage/logs/laravel.log',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/var/www/html/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'handler_with' => 
        array (
          'stream' => 'php://stderr',
        ),
        'formatter' => NULL,
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
        'facility' => 8,
        'replace_placeholders' => true,
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => '/var/www/html/storage/logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'scheme' => NULL,
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '1025',
        'username' => NULL,
        'password' => NULL,
        'timeout' => NULL,
        'local_domain' => 'qaabil.ddev.site',
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'resend' => 
      array (
        'transport' => 'resend',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
        'retry_after' => 60,
      ),
      'roundrobin' => 
      array (
        'transport' => 'roundrobin',
        'mailers' => 
        array (
          0 => 'ses',
          1 => 'postmark',
        ),
        'retry_after' => 60,
      ),
    ),
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'Laravel',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/var/www/html/resources/views/vendor/mail',
      ),
      'extensions' => 
      array (
      ),
    ),
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'role_pivot_key' => NULL,
      'permission_pivot_key' => NULL,
      'model_morph_key' => 'model_id',
      'team_foreign_key' => 'team_id',
    ),
    'register_permission_check_method' => true,
    'register_octane_reset_listener' => false,
    'events_enabled' => false,
    'teams' => false,
    'team_resolver' => 'Spatie\\Permission\\DefaultTeamResolver',
    'use_passport_client_credentials' => false,
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      \DateInterval::__set_state(array(
         'from_string' => true,
         'date_string' => '24 hours',
      )),
      'key' => 'spatie.permission.cache',
      'store' => 'default',
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
      'deferred' => 
      array (
        'driver' => 'deferred',
      ),
      'failover' => 
      array (
        'driver' => 'failover',
        'connections' => 
        array (
          0 => 'database',
          1 => 'deferred',
        ),
      ),
      'background' => 
      array (
        'driver' => 'background',
      ),
    ),
    'batching' => 
    array (
      'database' => 'mariadb',
      'table' => 'job_batches',
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mariadb',
      'table' => 'failed_jobs',
    ),
  ),
  'review-rateable' => 
  array (
    'user_model' => 'App\\Models\\User',
    'max_rating_value' => 5,
    'min_rating_value' => 1,
    'approved_review' => false,
    'departments' => 
    array (
      'default' => 
      array (
        'ratings' => 
        array (
          'overall' => 'Overall Rating',
          'customer_service' => 'Customer Service Rating',
          'quality' => 'Quality Rating',
          'price' => 'Price Rating',
        ),
      ),
      'sales' => 
      array (
        'ratings' => 
        array (
          'overall' => 'Overall Rating',
          'communication' => 'Communication Rating',
          'follow_up' => 'Follow-Up Rating',
          'price' => 'Price Rating',
        ),
      ),
      'support' => 
      array (
        'ratings' => 
        array (
          'overall' => 'Overall Rating',
          'speed' => 'Response Speed',
          'knowledge' => 'Knowledge Rating',
        ),
      ),
    ),
  ),
  'services' => 
  array (
    'postmark' => 
    array (
      'key' => NULL,
    ),
    'resend' => 
    array (
      'key' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'slack' => 
    array (
      'notifications' => 
      array (
        'bot_user_oauth_token' => NULL,
        'channel' => NULL,
      ),
    ),
    'github' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
    ),
    'google' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'database',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/var/www/html/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'laravel-session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
    'partitioned' => false,
  ),
  'ui-switcher' => 
  array (
    'driver' => 'database',
    'database_column' => 'ui_preferences',
    'defaults' => 
    array (
      'font' => 'Space Grotesk',
      'color' => '#6366f1',
      'layout' => 'sidebar-collapsed',
      'font_size' => 16,
      'density' => 'default',
    ),
    'icon' => 'heroicon-o-swatch',
    'fonts' => 
    array (
      0 => 'Inter',
      1 => 'Poppins',
      2 => 'Public Sans',
      3 => 'DM Sans',
      4 => 'Nunito Sans',
      5 => 'Roboto',
      6 => 'Space Grotesk',
      7 => 'Orbitron',
      8 => 'Exo 2',
      9 => 'Rajdhani',
      10 => 'Oxanium',
      11 => 'Audiowide',
      12 => 'Syncopate',
      13 => 'Jura',
      14 => 'Share Tech Mono',
    ),
    'custom_colors' => 
    array (
      0 => '#6366f1',
      1 => '#3b82f6',
      2 => '#0ea5e9',
      3 => '#10b981',
      4 => '#22c55e',
      5 => '#84cc16',
      6 => '#eab308',
      7 => '#f59e0b',
      8 => '#f97316',
      9 => '#ef4444',
      10 => '#ec4899',
      11 => '#8b5cf6',
      12 => '#00fff5',
      13 => '#ff00ff',
      14 => '#39ff14',
      15 => '#ff3131',
      16 => '#bf00ff',
      17 => '#ff6ec7',
      18 => '#0d9488',
      19 => '#0369a1',
      20 => '#4f46e5',
      21 => '#7c3aed',
      22 => '#be123c',
      23 => '#b45309',
      24 => '#94a3b8',
      25 => '#64748b',
      26 => '#475569',
      27 => '#6ee7f7',
      28 => '#a78bfa',
      29 => '#f0abfc',
    ),
    'layouts' => 
    array (
      0 => 'sidebar',
      1 => 'sidebar-collapsed',
      2 => 'sidebar-no-topbar',
      3 => 'topbar',
    ),
    'font_size_range' => 
    array (
      'min' => 12,
      'max' => 20,
    ),
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'public_path' => NULL,
    'convert_entities' => true,
    'options' => 
    array (
      'font_dir' => '/var/www/html/storage/fonts',
      'font_cache' => '/var/www/html/storage/fonts',
      'temp_dir' => '/tmp',
      'chroot' => '/var/www/html',
      'allowed_protocols' => 
      array (
        'data://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'file://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'http://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'https://' => 
        array (
          'rules' => 
          array (
          ),
        ),
      ),
      'artifactPathValidation' => NULL,
      'log_output_file' => NULL,
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_paper_orientation' => 'portrait',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => false,
      'allowed_remote_hosts' => NULL,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => true,
    ),
  ),
  'blade-heroicons' => 
  array (
    'prefix' => 'heroicon',
    'fallback' => '',
    'class' => '',
    'attributes' => 
    array (
    ),
  ),
  'blade-icons' => 
  array (
    'sets' => 
    array (
    ),
    'class' => '',
    'attributes' => 
    array (
    ),
    'fallback' => '',
    'components' => 
    array (
      'disabled' => false,
      'default' => 'icon',
    ),
  ),
  'auth-designer' => 
  array (
  ),
  'filament-socialite' => 
  array (
    'middleware' => 
    array (
      0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
      1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
      2 => 'Illuminate\\Session\\Middleware\\StartSession',
      3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
      4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
    ),
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'strict_null_comparison' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => false,
        'include_separator_line' => false,
        'excel_compatibility' => false,
        'output_encoding' => '',
        'test_auto_detect' => true,
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'ignore_empty' => false,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => NULL,
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'guess',
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
      'cells' => 
      array (
        'middleware' => 
        array (
        ),
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
      'default_ttl' => 10800,
    ),
    'transactions' => 
    array (
      'handler' => 'db',
      'db' => 
      array (
        'connection' => NULL,
      ),
    ),
    'temporary_files' => 
    array (
      'local_path' => '/var/www/html/storage/framework/cache/laravel-excel',
      'local_permissions' => 
      array (
      ),
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
      'force_resync_remote' => NULL,
    ),
  ),
  'sidebar-resize' => 
  array (
    'min_width' => 200,
    'max_width' => 450,
  ),
  'blade-fontawesome' => 
  array (
    'brands' => 
    array (
      'prefix' => 'fab',
      'fallback' => '',
      'class' => '',
      'attributes' => 
      array (
      ),
    ),
    'regular' => 
    array (
      'prefix' => 'far',
      'fallback' => '',
      'class' => '',
      'attributes' => 
      array (
      ),
    ),
    'solid' => 
    array (
      'prefix' => 'fas',
      'fallback' => '',
      'class' => '',
      'attributes' => 
      array (
      ),
    ),
    'duotone' => 
    array (
      'prefix' => 'fad',
      'fallback' => '',
      'class' => '',
      'attributes' => 
      array (
      ),
    ),
    'light' => 
    array (
      'prefix' => 'fal',
      'fallback' => '',
      'class' => '',
      'attributes' => 
      array (
      ),
    ),
    'thin' => 
    array (
      'prefix' => 'fat',
      'fallback' => '',
      'class' => '',
      'attributes' => 
      array (
      ),
    ),
    'sharp-light' => 
    array (
      'prefix' => 'fal:sharp',
      'fallback' => '',
      'class' => '',
      'attributes' => 
      array (
      ),
    ),
    'sharp-regular' => 
    array (
      'prefix' => 'far:sharp',
      'fallback' => '',
      'class' => '',
      'attributes' => 
      array (
      ),
    ),
    'sharp-solid' => 
    array (
      'prefix' => 'fas:sharp',
      'fallback' => '',
      'class' => '',
      'attributes' => 
      array (
      ),
    ),
    'sharp-duotone-solid' => 
    array (
      'prefix' => 'fad:sharp',
      'fallback' => '',
      'class' => '',
      'attributes' => 
      array (
      ),
    ),
    'sharp-thin' => 
    array (
      'prefix' => 'fat:sharp',
      'fallback' => '',
      'class' => '',
      'attributes' => 
      array (
      ),
    ),
    'custom-icons' => 
    array (
      'prefix' => 'fak',
      'fallback' => '',
      'class' => '',
      'attributes' => 
      array (
      ),
    ),
  ),
  'settings' => 
  array (
    'settings' => 
    array (
    ),
    'setting_class_path' => '/var/www/html/app/Settings',
    'migrations_paths' => 
    array (
      0 => '/var/www/html/database/settings',
    ),
    'default_repository' => 'database',
    'repositories' => 
    array (
      'database' => 
      array (
        'type' => 'Spatie\\LaravelSettings\\SettingsRepositories\\DatabaseSettingsRepository',
        'model' => NULL,
        'table' => NULL,
        'connection' => NULL,
      ),
      'redis' => 
      array (
        'type' => 'Spatie\\LaravelSettings\\SettingsRepositories\\RedisSettingsRepository',
        'connection' => NULL,
        'prefix' => NULL,
      ),
    ),
    'encoder' => NULL,
    'decoder' => NULL,
    'cache' => 
    array (
      'enabled' => false,
      'store' => NULL,
      'prefix' => NULL,
      'ttl' => NULL,
      'memo' => false,
    ),
    'global_casts' => 
    array (
      'DateTimeInterface' => 'Spatie\\LaravelSettings\\SettingsCasts\\DateTimeInterfaceCast',
      'DateTimeZone' => 'Spatie\\LaravelSettings\\SettingsCasts\\DateTimeZoneCast',
      'Spatie\\LaravelData\\Data' => 'Spatie\\LaravelSettings\\SettingsCasts\\DataCast',
    ),
    'auto_discover_settings' => 
    array (
      0 => '/var/www/html/app/Settings',
    ),
    'discovered_settings_cache_path' => '/var/www/html/bootstrap/cache',
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
    'trust_project' => 'always',
  ),
  'eloquent-has-many-deep' => 
  array (
    'ide_helper_enabled' => true,
  ),
  'ide-helper' => 
  array (
    'model_hooks' => 
    array (
      0 => 'Staudenmeir\\EloquentHasManyDeep\\IdeHelper\\DeepRelationsHook',
    ),
  ),
);
