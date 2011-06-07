<?php defined('SYSPATH') or die('No direct script access.');

return array(
     'cookie' => array(
         'name' => 'session_cookie',
         'encrypted' => TRUE,
         'lifetime' => 43200,
     ),
     'native' => array(
         'name' => 'session_native',
         'encrypted' => TRUE,
         'lifetime' => 43200,
     ),
     'database' => array(
         'name' => 'session_database',
         'group' => 'default',
         'table' => 'sessions',
         'encrypted' => TRUE,         
     ),
 );
