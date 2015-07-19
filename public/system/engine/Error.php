<?php

class Error {

	public $ERROR_STATE;
	public $db;

	private $registry;

	public function __construct ($registry) {
		$this->registry = $registry;
		$this->ERROR_STATE =  1;
	}

	public function handleError ($errno, $errstr, $errfile, $errline)
	{
		$errortype = array(
		  E_ERROR               => 'error',
		  E_WARNING             => 'warning',
		  E_PARSE               => 'parsing error',
		  E_NOTICE              => 'notice',
		  E_CORE_ERROR          => 'core error',
		  E_CORE_WARNING        => 'core warning',
		  E_COMPILE_ERROR       => 'compile error',
		  E_COMPILE_WARNING     => 'compile warning',
		  E_USER_ERROR          => 'user error',
		  E_USER_WARNING        => 'user warning',
		  E_USER_NOTICE         => 'user notice',
		  E_STRICT              => 'interoperability warning',
          E_RECOVERABLE_ERROR   => 'recoverable error',
		  E_DEPRECATED          => 'deprecated warning',
		  E_USER_DEPRECATED     => 'deprecated warning',);

		$errType=$errortype[$errno];
		if (isset($this->registry->get('server')->get['error'])) {
			$prevState= $this->ERROR_STATE;
			$this->ERROR_STATE=$this->registry->get('server')->get['error'];
		}

		if ($this->ERROR_STATE != 0) {
			echo "<hr>";
			echo "<br> File: ". $errfile;
			echo "<br> Type: ". $errType. "        Line : ". $errline;
			echo "<br> " . $errstr;
		}

		if (isset($prevState)) {
			$this->ERROR_STATE = $prevState;
		}
	}
}
