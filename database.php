<?php
class Database
{


    private static $databasehost = "localhost";
	private static $databaseNAME = "vehicules";
	private static $databaseUsername = "root";
	private static $databaseUserPassword = "";


	private static $connection = null;

	public static function connecter ()
	{	try
	{

	self::$connection = new PDO("mysql:host=" . self::$databasehost . ";dbname=". self::$databaseNAME,self::$databaseUsername,self::$databaseUserPassword);
	}

	catch (PDOException $error) {

		die($e->getMessage());



	}

	return self::$connection;
}

 public static function deconnecter ()
{
	self::$connection = null;
}


}



	

?>