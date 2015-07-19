<?php

class Controller
{
	public function __construct($registry) {
		$this->registry = $registry;
	}

	public function model($model)
	{
		require_once APP.APPLICATION. '/models/'.$model.'.php';
		return new $model();
	}

	public function view($view, $data = [])
	{
		$class = ucfirst($view.'View');

		if(!file_exists(APP.APPLICATION.'/views/'.$view.'.php')) {
			trigger_error("file does not exist :". APP.APPLICATION.'/views/'.$view.'.php');
			exit();
		}
		require(APP.APPLICATION.'/views/'.$view.'.php');
		(new $class($this->registry))->index('/'.$view, $data);
		}
}
