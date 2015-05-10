<?php

defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------
// Load the core Kohana class

require SYSPATH . 'classes/Kohana/Core' . EXT;

if (is_file(APPPATH . 'classes/Kohana' . EXT)) {
    // Application extends the core
    require APPPATH . 'classes/Kohana' . EXT;
} else {
    // Load empty core extension
    require SYSPATH . 'classes/Kohana' . EXT;
}

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('America/Sao_Paulo');

/**
 * Set the default locale.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'pt_BR.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------
/**
 * Set the default language
 */
I18n::lang('pt-br');

Cookie::$salt = 'atividade06';

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
Kohana::$environment = Kohana::PRODUCTION;

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
Kohana::init(array(
    'base_url' => '/',
    'index_file' => FALSE,
    'profile' => (Kohana::$environment !== Kohana::PRODUCTION), //see how good you are
    'caching' => (Kohana::$environment === Kohana::PRODUCTION),
    'errors' => TRUE, //for custom 404, 500 FALSE for internal error handling
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH . 'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
    'database' => MODPATH . 'database', // Database access
    'image' => MODPATH . 'image', // Image manipulation
    'orm' => MODPATH . 'orm', // Object Relationship Mapping
    'imagefly' => MODPATH . 'imagefly', // Resize image fly, requires image module -> https://github.com/Bodom78/imagefly
        //'email' => MODPATH . 'email', // helpers para data, entrada, segurança, arrays e validação
        //'recaptcha' => MODPATH . 'recaptcha', // fcke editor
        //'auth' => MODPATH . 'auth', // Basic authentication
        // 'cache'      => MODPATH.'cache',      // Caching with multiple backends
        // 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
        // 'unittest'   => MODPATH.'unittest',   // Unit testing
        //'userguide' => MODPATH . 'userguide', // User guide and API documentation
));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
/**
 * Execute the main request. A source of the URI can be passed, eg: $_SERVER['PATH_INFO'].
 * If no source is specified, the URI will be automatically detected.
 */
Route::set('inicio', '(inicio)')
        ->defaults(array(
            'controller' => 'Inicio',
            'action' => 'index',
        ));

Route::set('login', 'login')
        ->defaults(array(
            'controller' => 'Autenticacao',
            'action' => 'login',
        ));

Route::set('logout', 'logout')
        ->defaults(array(
            'controller' => 'Autenticacao',
            'action' => 'logout',
        ));

Route::set('logoutseguro', 'logoutseguro')
        ->defaults(array(
            'controller' => 'Autenticacao',
            'action' => 'logoutseguro',
        ));


Route::set('cadastrar', 'cadastrar')
        ->defaults(array(
            'controller' => 'Cadastrar',
            'action' => 'exibe',
        ));

Route::set('minhaconta', 'minhaconta')
        ->defaults(array(
            'controller' => 'Minhaconta',
            'action' => 'exibe',
        ));

Route::set('excluir', 'excluir')
        ->defaults(array(
            'controller' => 'Excluir',
            'action' => 'excluir',
        ));


Route::set('listagem', 'listagem')
        ->defaults(array(
            'controller' => 'Participantes',
            'action' => 'listagem',
        ));

Route::set('exibir', 'exibir/<id>')
        ->defaults(array(
            'controller' => 'Participantes',
            'action' => 'exibir',
        ));

Route::set('ajax', 'ajax/<action>(/<id>)')
        ->defaults(array(
            'controller' => 'Ajax',
        ));

Route::set('default', '<url>', array('url' => '.*'))
        ->defaults(array(
            'controller' => 'Erro',
            'action' => '404',
        ));
