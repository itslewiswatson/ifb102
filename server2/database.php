<?php

class Database
{
	/** @var mysqli */
	private $connection;

	final public function __construct()
	{
		$connection = new mysqli("localhost", "root", "local", "ifb102", 3306);
		if (!$connection) {
			die("Cannot connect to database");
		}
		$this->connection = $connection;
	}

	/**
	 * getConnection
	 * 
	 * @returns mysqli
	 */
	public function getConnection()
	{
		return $this->connection;
	}
}