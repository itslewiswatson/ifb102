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

	public function persistNewApiKey(): string
	{
		if (!is_a($this->db, Database::class)) {
			$this->db = new Database();
		}
		/** @var mysqli $connection */
		$connection = $this->db->getConnection();

		/** @var string */
		//$apiKey = null;
		//do {
			$apiKey = $this->generate();
		//} while (!$this->doesKeyExist($apiKey));

		$stmnt = $connection->prepare(
			"INSERT INTO `" . self::tableName . "` (`api_key`, `generated_at`) VALUES (?, UNIX_TIMESTAMP())"
		);
		$stmnt->bind_param("s", $apiKey);
		$stmnt->execute();

		return $apiKey;
	}
}