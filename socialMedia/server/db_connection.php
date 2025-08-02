<?php

/**
 *
 */
class Database
{

	private static $dbHost = "localhost";
	public static $dbName = "smeetup";
	public static $dbUser = "root";
	public static $dbUserPassword = "";

	private static $connetion = null;


	public static function connect()
	{
		try {
		//$connexion = PDO("mysql:host=localhost;dbname=ecommerce", "root", "");

		self::$connetion = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUser, self::$dbUserPassword);

	} catch (Exception $e) {
		die($e->getMessage());
	}
	return self::$connetion;
	}
	public static function disconnect(){
		self::$connetion = null;
	}
}

	Database::connect();


?>
