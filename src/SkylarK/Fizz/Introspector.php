<?php
/**
 * Fizz is a lightweight ORM
 *
 * @author Skylar Kelty <skylarkelty@gmail.com>
 */

namespace SkylarK\Fizz;

/**
 * The core of Fizz Introspector
 */
class Introspector
{
	/** Our PDO instance */
	private $_fizz_pdo;

	/**
	 * Initialize a Fizz object
	 * 
	 * @param string $db_dsn A PDO connection string
	 * @param string $db_username A PDO connection username
	 * @param string $db_password A PDO connection password
	 */
	public function __construct($db_dsn, $db_username = NULL, $db_password = NULL) {
		$this->_fizz_pdo = new \PDO($db_dsn, $db_username, $db_password);
		if (!$this->_fizz_pdo) {
			throw new Exceptions\FizzDatabaseConnectionException("Could not connect to Database");
		}
	}
}
