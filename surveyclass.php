<?php

class Table
{	
	public $link;

	function __construct()
	{
		$user="whoag1"; //username
		$pass="IofQ58sg"; //password
		$dbname="whaog1"; //db name
		$host="webdev.cs.kent.edu"; // db host
		
	

		$link = new PDO(sprintf('mysql:host=%s;dbname=%s', $host, $dbname), $user, $pass);
	}

	function __destruct()
	{
		$link = null;

	}			

}


class Campus extends Table 
{
	public $row, $name, $abbr, $state;

	function __construct()
	{
		//need a campus class 
		parent::__construct(); //superclass construct		
	}

	public function getAll()
	{
		$sql = 'SELECT * FROM campus ORDER BY name';
		return $link->query($sql);
	}
}


class College extends Table 
{
	public $row, $name, $abbr, $state;

	function __construct()
	{
		//need a campus class	
		parent::__construct(); //superclass construct
	}

	// public function get
}






?>
