<?php
#page Titles
define('WEB_NAME', 'Admin');

#page Url
define('URL', 'http://localhost/merchant');
define('FILE_URL', 'http://localhost/merchant');


#DB Information
define('DB_DSN', 'mysql:host=localhost;dbname=merchant');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

define('TBL_USERS_ACCOUNT', 'users');
define('TBL_CUSTOMER_STATEMENT', 'customer_statement');
define('TBL_CUSTOMER_ORDER', 'customer_order');
define('TBL_MEMBERSHIP', 'customer_membership');
define('TBL_LOGIN_RECORD', 'login_record');
define('TBL_MESSAGE_RECORD', 'message_record');

#Error status
global $ERR_STATUS = null;

#Error status code
define('ERR_CONTROLLER', 1);
define('ERR_ACTION', 2);

 ?>
