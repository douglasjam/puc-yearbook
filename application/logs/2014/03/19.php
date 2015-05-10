<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-03-19 12:39:22 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: HTTP_USER_AGENT ~ APPPATH/classes/Model/Acesso.php [ 15 ] in /media/work/diguinho/application/classes/Model/Acesso.php:15
2014-03-19 12:39:22 --- DEBUG: #0 /media/work/diguinho/application/classes/Model/Acesso.php(15): Kohana_Core::error_handler(8, 'Undefined index...', '/media/work/dig...', 15, Array)
#1 /media/work/diguinho/modules/orm/classes/Kohana/ORM.php(46): Model_Acesso->__construct(NULL)
#2 /media/work/diguinho/application/classes/Template/Diguinho.php(15): Kohana_ORM::factory('Acesso')
#3 /media/work/diguinho/system/classes/Kohana/Controller.php(69): Template_Diguinho->before()
#4 [internal function]: Kohana_Controller->execute()
#5 /media/work/diguinho/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Inicio))
#6 /media/work/diguinho/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /media/work/diguinho/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /media/work/diguinho/index.php(118): Kohana_Request->execute()
#9 {main} in /media/work/diguinho/application/classes/Model/Acesso.php:15