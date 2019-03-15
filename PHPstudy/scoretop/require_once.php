<?php
	$username = "root";
	$password = "781180326";
	if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] != $username || $_SERVER['PHP_AUTH_PW'] != $password ){

		header('http/1.1 401 Unauthorized');
		header('WWW-Authenticate:Basic realm = "the score"');
		exit("sorry,you have been enter a username and password");
	}

?>