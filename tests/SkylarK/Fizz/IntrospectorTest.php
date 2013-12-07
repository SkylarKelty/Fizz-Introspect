<?php

class IntrospectorTest extends PHPUnit_Framework_TestCase
{
	public function setUp() {
		$this->introspector = new SkylarK\Fizz\Introspector("mysql:dbname=testdb;host=127.0.0.1", "travis", "");
	}

	public function test_Tables() {
		$tables = $this->introspector->getTables();

		$this->assertEquals(1, count($tables));
		$this->assertEquals("Demo", $tables[0]);
	}

	public function test_ColumnMeta() {
		$meta = $this->introspector->getMeta("Demo");

		$this->assertEquals(2, count($meta));
		$this->assertEquals("key", $meta[0]["name"]);
		$this->assertEquals("value", $meta[1]["name"]);
	}
}