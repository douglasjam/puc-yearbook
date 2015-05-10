<?php

defined('SYSPATH') OR die('No direct access allowed.');

return array
    (
    'default' => array
        (
        'type' => 'MySQL',
        'connection' => array(
            'hostname' => 'localhost',
            'database' => 'atividade06douglasjam',
            'username' => 'root',
            'password' => 'root',
            'persistent' => FALSE,
        ),
        'table_prefix' => '',
        'charset' => 'utf8',
        'caching' => FALSE,
    ),
);
