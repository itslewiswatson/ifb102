<?php

class Database
{
	/** @var mysqli */
	private $connection;

	final public function __construct()
	{
		// `mysql` is the container name, so we use that to connect
		$connection = new mysqli("mysql", "root", "local", "ifb102", 3306);
		if (!$connection || $connection->errno) {
			die("Cannot connect to database - error: " . $connection->errno);
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