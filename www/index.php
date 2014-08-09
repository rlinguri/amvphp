<?php

/* MAIN APPLICATION BOOTSTRAPPER
|  Here is where you set how the application routes incoming HTTP requests.
|  If you use a class-naming convention with a certain number of letters, you
|  can automate this process. Otherwise, you can use a switch statement.
|  Since $_GET and $_POST are superglobals, you can process any additional
|  parameters through your action classes.
*/

/* load configuration file, which imports base classes */
require_once('../usr/conf/config.php');

/* this if-else block sets a value for $obj based on server request variables */
if (isset($_POST['action'])) {

	/* here I am simply using the value passed in for action as the class name */
	$obj = $_POST['action'];
	$cla = ucwords($obj).'Ctrl';
	
} elseif (isset($_GET['action'])) {

	/* post variables take precedence */
	$obj = $_GET['action'];
	$cla = ucwords($obj).'Ctrl';
	
} else {

	/* if nothing is passed in, perform a default action */
	$obj = 'home';
	$cla = 'HomeCtrl';

}

/* finally, require the file containing the class definition and create the object */
require_once('../app/action/'.$obj.'.php');
$$obj = new $cla;


