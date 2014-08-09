<?php

require_once('../usr/conf/config.php');
require_once('../app/action/home.php');

$action = new HomeCtrl;

print_r(get_defined_vars());