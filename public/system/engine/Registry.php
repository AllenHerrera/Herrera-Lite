<?php

class Registry {

	private $instance;

	// public static function getInstance() {
	// 	if(!isset(Registry::$instance)) {
	// 		Registry::$instance = new Registry();
	// 	}
	// 	return Registry::$instance;
	// }

	public function __construct ()
	{
		$this->instance = array();
	}

	public function set($key,$value)
	{
		$this->instance[$key] = $value;

	}

	public function get($key)
	{
		return $this->instance[$key];
	}
}
