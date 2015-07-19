<?php
//4219
class Server {
	public $get;
	public $post;
	public $files;
	public $request;
	public $server;
	public $session;
	public $env;
	public $cookie;

	public function __construct()
	{
		$this->get = $this->clean($_GET);
		$this->post = $this->clean($_POST);
		$this->files = $this->clean($_FILES);
		$this->request = $this->clean($_REQUEST);
	//	$this->server = $this->clean($_SERVER);
		$this->session= $this->clean($_SESSION);
		$this->env = $this->clean($_ENV);
		$this->cookie = $this->clean($_COOKIE);

	}

	public function clean ($item)
	{
		if(is_array($item)) {
			foreach ($item as $key => $value) {

				$item[$this->clean($key)] = $this->clean($value);
			}
			return $item;
		} else {
			$item = htmlspecialchars($item);
			return $item;
		}

	}


}
?>
