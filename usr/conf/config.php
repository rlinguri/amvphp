<?php

require_once('../lib/base/object.php');

defined('STE_TTL') ? null : define('STE_TTL','Action-Model-View');

// database connection constants
defined('LCL_HST') ? null : define('LCL_HST','localhost');
defined('LCL_USN') ? null : define('LCL_USN','username');
defined('LCL_PSW') ? null : define('LCL_PSW','password');
defined('LCL_DBS') ? null : define('LCL_DBS','database');

defined('RMT_HST') ? null : define('RMT_HST','hostedresource.com');
defined('RMT_USN') ? null : define('RMT_USN','remote_user');
defined('RMT_PSW') ? null : define('RMT_PSW','remote_password');
defined('RMT_DBS') ? null : define('RMT_DBS','remote_database');


$base = '../lib/base';

foreach (scandir($base) as $file) {
	if (substr($file, 0, 1) != '.')
    require_once($base.'/'.$file);
}
