<?php

class IntrospectorTest extends PHPUnit_Framework_TestCase
{
	public function setUp() {
		try {
			SkylarK\Fizz\FizzConfig::setDB("mysql:dbname=testdb;host=127.0.0.1", "travis", "");
		}
		catch (PDOException $e) {
			die($e->getMessage());
			exit(0);
		}

		$this->introspector = new SkylarK\Fizz\Introspector();
	}

	public function test_Tables() {
		$foldername = "/tmp/FizzIntrospectorTest";

		if (!file_exists($foldername)) {
			mkdir($foldername);
		}

		$this->introspector->saveModels($foldername);
		$this->assertEquals(2, count(glob("$foldername/*.php")));
	}
}