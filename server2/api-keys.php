<?php

require("./database.php");

class ApiKey
{
	/** @var Database */
	private $db;

	private const keyLength	= 16;
	private const tableName = "__api__keys";

	/* PUBLIC METHODS */
	/**
	 * __construct
	 */
	final public function __construct()
	{
		
	}

	/**
	 * generate
	 * 
	 * @returns string
	 */
	public function generate(): string
	{
        return substr(md5(strval(rand())), 0, self::keyLength);
	}

	/**
	 * doesKeyExist
	 * 
	 * @param string $apiKey
	 */
	public function doesKeyExist(string $apiKey): bool
	{
		if (!is_a($this->db, Database::class)) {
			$this->db = new Database();
		}
		/** @var mysqli $connection */
		$connection = $this->db->getConnection();
		$queryString = "SELECT * FROM `" . self::tableName . "` WHERE `api_key` = '" . $apiKey . "'";
		$query = $connection->query($queryString);
		return ($query && $query->num_rows === 1) ? true : false;
	}
}