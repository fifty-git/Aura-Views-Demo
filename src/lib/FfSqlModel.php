<?php
require_once BASE_PATH . '/src/Sql/Exception.php';
require_once BASE_PATH . '/src/Sql/Exception/ConnectionNotFound.php';
require_once BASE_PATH . '/src/Sql/ConnectionLocatorInterface.php';
require_once BASE_PATH . '/src/Sql/ConnectionLocator.php';
require_once BASE_PATH . '/src/Sql/PdoInterface.php';
require_once BASE_PATH . '/src/Sql/ExtendedPdoInterface.php';
require_once BASE_PATH . '/src/Sql/ExtendedPdo.php';
require_once BASE_PATH . '/src/Sql/ProfilerInterface.php';
require_once BASE_PATH . '/src/Sql/Profiler.php';
require_once BASE_PATH . '/src/Sql/Rebuilder.php';

/**
 *
 */
class ffSqlModel
{
  private $host = null;
	private $dbName = null;
	private $dbUsername = null;
	private $dbPassword = null;
	private $pdo = null;

  function __construct()
  {

    /**
     * The aura_demo database contains 3 tables from the Dev8 DB.
     * I created it for working locally, just install and set the credentials here.
     * Since the tables match Dev8 DB you won't have to change any code but this connection info
     * if you want to work on your sandbox
     */
    $this->host = "localhost";
    $this->dbName = "aura_demo";
    $this->dbUsername = "aura_user";
    $this->dbPassword = "FlowerPower";

    $extendedPdoDb = "mysql:host=".$this->host.";dbname=".$this->dbName;
    $extendedPdoUsername = $this->dbUsername;
    $extendedPdoPassword = $this->dbPassword;

    $this->pdo = new Aura\Sql\ExtendedPdo($extendedPdoDb, $extendedPdoUsername, $extendedPdoPassword);
  }

  public function query($statement)
	{
		try {
			$statementHandle = $this->pdo->query($statement);
		} catch (Exception $e) {
			$this->emailError($e, $statement);
		}
		return $statementHandle;
	}

	public function rowCount($statementHandle)
	{
		$statement = "This was a rowCount() query";
		try {
			return $statementHandle->rowCount();
		} catch (Exception $e) {
			$this->emailError($e, $statement);
		}
	}
  public function fetchAllStatementHandle($statementHandle)
  	{
  		$statement = "This was a PDO::FETCH_ASSOC query";
  		try {
  			return $statementHandle->fetchAll(PDO::FETCH_ASSOC);
  		} catch (Exception $e) {
  			$this->emailError($e, $statement);
  		}
  	}

  	public function perform($statement, $bindValues=array())
  	{
  		try {
  			$statementHandle = $this->pdo->perform($statement, $bindValues);
  		} catch (Exception $e) {
  			$this->emailError($e, $statement);
  		}
  		return $statementHandle;
  	}

  	public function fetchAll($statement, $bindValues=array())
  	{
  		try {
  			$result = $this->pdo->fetchAll($statement, $bindValues);
  		} catch (Exception $e) {
  			//$this->emailError($e, $statement);
        error_log($e->getMessage());
  		}
  		return $result;
  	}

  	public function fetchFirstRow($statement, $bindValues=array())
  	{
  		try {
  			$result = $this->pdo->fetchOne($statement, $bindValues);
  		} catch (Exception $e) {
  			$this->emailError($e, $statement);
  		}
  		return $result;
  	}

  	public function fetchFirstField($statement, $bindValues=array())
  	{
  		try {
  			$result = $this->pdo->fetchValue($statement, $bindValues);
  		} catch (Exception $e) {
  			$this->emailError($e, $statement);
  		}
  		return $result;
  	}

  	public function fetchAffected($statement, $bindValues=array())
  	{
  		try {
  			$result = $this->pdo->fetchAffected($statement, $bindValues);
  		} catch (Exception $e) {
  			$this->emailError($e, $statement);
  		}
  		return $result;
  	}

  	public function insertId()
  	{
  		$statement = "This was a lastInsertId() query";
  		try {
  			return $this->pdo->lastInsertId();
  		} catch (Exception $e) {
  			$this->emailError($e, $statement);
  		}
  	}
}
