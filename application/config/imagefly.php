<?php

defined('SYSPATH') or die('No direct script access.');
/**
 * @package   Modules
 * @category  Imagefly
 * @author    Fady Khalife
 * @uses      Image Module
 */
return array(
    'cache_expire' => 60 * 60 * 24 * 7, // 7 dias
    'cache_dir' => 'media/cache/',
    'mimic_source_dir' => TRUE,
    'enforce_presets' => FALSE,
    'scale_up' => TRUE,
    'presets' => array(
        'w320-h240-c-q60',
    ),
);
